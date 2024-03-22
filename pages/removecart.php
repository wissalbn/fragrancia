<?php
session_start();
require('../pages/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["productId"])) {
        $productId = $_POST["productId"];
        deleteProduct($productId);
    } else {
        echo "Product ID is missing.";
    }
} else {
    echo "Invalid request method.";
}

function deleteProduct($productId)
{
    if (!isset($_SESSION['userId'])) {
        echo "User is not logged in";
        return;
    }

    global $bdd;
    $idClient = $_SESSION['userId'];

    // Retrieve the cart ID for the user
    $cartQuery = "SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?";
    $cartStmt = $bdd->prepare($cartQuery);
    $cartStmt->bind_param('i', $idClient);
    $cartStmt->execute();
    $cartResult = $cartStmt->get_result();

    if ($cartResult->num_rows == 0) {
        echo "Cart not found for the user.";
        return;
    }

    $cartRow = $cartResult->fetch_assoc();
    $cartId = $cartRow['IDPANIER'];

    // Delete the product from the cart
    $sql = "DELETE FROM panier WHERE IDPANIER = ? AND IDPROD = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bind_param('ii', $cartId, $productId);

    if ($stmt->execute()) {
        echo "Product deleted successfully";
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
}
?>
