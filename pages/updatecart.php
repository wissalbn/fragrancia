<?php
session_start();
require_once("connection.php"); // Include your database connection file

// Check if productId and quantity are provided in the POST request
if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Update cart quantity in the database
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

// Function to update cart quantity in the database
function updateCartQuantity($bdd, $userId, $productId, $quantity) {
    // Prepare SQL statement to update quantity in the cart table
    $sql = "UPDATE panier AS pa 
            JOIN client_cart AS cc ON pa.IDPANIER = cc.IDPANIER 
            SET pa.QUANTITE = ?
            WHERE cc.IDCLIENT = ? AND pa.IDPROD = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bind_param('iii', $quantity, $userId, $productId);
    
    // Execute the SQL statement
    if ($stmt->execute()) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}
?>
