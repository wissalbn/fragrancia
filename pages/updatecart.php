<?php
session_start();
require_once("connection.php"); // Include your database connection file

// Check if productId and quantity are provided in the POST request
if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Update cart quantity and total in the database
    $updateResult = updateCartQuantity($bdd, $_SESSION['userId'], $productId, $quantity);

    // Send response back to JavaScript
    if ($updateResult) {
        // Update successful
        echo 'success';
    } else {
        // Update failed
        echo 'error';
    }
} else {
    // Invalid request
    echo 'error';
}

// Function to update cart quantity and total in the database
function updateCartQuantity($bdd, $userId, $productId, $quantity) {
    // Fetch the product price
    $priceQuery = "SELECT PRIXPROD FROM produit WHERE IDPROD = ?";
    $priceStmt = $bdd->prepare($priceQuery);
    $priceStmt->bind_param('i', $productId);
    $priceStmt->execute();
    $priceResult = $priceStmt->get_result();

    if ($priceResult->num_rows == 0) {
        return false; // Product not found
    }

    $priceRow = $priceResult->fetch_assoc();
    $productPrice = $priceRow['PRIXPROD'];

    // Calculate new total based on updated quantity
    $newTotal = $productPrice * $quantity;

    // Prepare SQL statement to update quantity and total in the cart table
    $sql = "UPDATE panier AS pa 
            JOIN client_cart AS cc ON pa.IDPANIER = cc.IDPANIER 
            SET pa.QUANTITE = ?, pa.TOTAL = ?
            WHERE cc.IDCLIENT = ? AND pa.IDPROD = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bind_param('idii', $quantity, $newTotal, $userId, $productId);
    
    // Execute the SQL statement
    if ($stmt->execute()) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}
?>
