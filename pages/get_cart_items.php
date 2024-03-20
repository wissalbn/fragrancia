<?php
session_start();
require_once("connection.php"); // Assuming connection.php contains the database connection logic

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $sql = "SELECT p.IDPROD, p.NOMPROD, p.PRIXPROD, p.URLIMAGE, pa.QUANTITE FROM panier AS pa 
        JOIN produit AS p ON pa.IDPROD = p.IDPROD 
        JOIN client_cart AS cc ON pa.IDPANIER = cc.IDPANIER 
        WHERE cc.IDCLIENT = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store the cart items in an array
    $cartItems = array();
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }

    // Return the cart items as JSON
    header('Content-Type: application/json');
    echo json_encode($cartItems);
} else {
    // If user is not logged in, return an empty array
    echo json_encode(array());
}
?>
