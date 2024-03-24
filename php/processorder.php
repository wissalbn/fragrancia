<?php
session_start();

require_once('../pages/connection.php');

header('Content-Type: application/json');

if (!isset($_SESSION['userId'])) {
    echo json_encode(array('success' => false, 'message' => 'User is not logged in'));
    exit; // Stop further execution
}

$userID = $_SESSION['userId'];

// Get the total price of the items in the cart for the user
$getTotalPriceQuery = "SELECT SUM(TOTAL) AS total_price FROM panier WHERE IDPANIER IN (SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?)";
$stmt = $bdd->prepare($getTotalPriceQuery);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $totalPrice = $row['total_price'];
} else {
    echo json_encode(array('success' => false, 'message' => 'Failed to retrieve total price from the cart'));
    exit; // Stop further execution
}

// Insert a new order into the commande table
$insertOrderQuery = "INSERT INTO commande (IDCLIENT, TOTAUX, DATECOMMANDE) VALUES (?, ?, NOW())";
$stmt = $bdd->prepare($insertOrderQuery);
$stmt->bind_param('id', $userID, $totalPrice);
if (!$stmt->execute()) {
    echo json_encode(array('success' => false, 'message' => 'Failed to insert new order'));
    exit; // Stop further execution
}

// Retrieve the ID of the newly inserted order
$orderID = $stmt->insert_id;

// Retrieve the items from the cart for the user
$getCartItemsQuery = "SELECT IDPROD, QUANTITE, TOTAL FROM panier WHERE IDPANIER IN (SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?)";
$stmt = $bdd->prepare($getCartItemsQuery);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();

// Insert each item from the cart into the commande_items table
$insertItemsQuery = "INSERT INTO commande_items (IDCOMMANDE, IDPROD, QUANTITE, PRIX) VALUES (?, ?, ?, ?)";
$stmt = $bdd->prepare($insertItemsQuery);
$stmt->bind_param('iiid', $orderID, $productID, $quantity, $price);

while ($row = $result->fetch_assoc()) {
    $productID = $row['IDPROD'];
    $quantity = $row['QUANTITE'];
    $price = $row['TOTAL'] / $quantity; // Calculate price per item
    
    if (!$stmt->execute()) {
        echo json_encode(array('success' => false, 'message' => 'Failed to insert items into order'));
        exit; // Stop further execution
    }
}

// Empty the cart for the current user
$emptyCartQuery = "DELETE FROM panier WHERE IDPANIER IN (SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?)";
$stmt = $bdd->prepare($emptyCartQuery);
$stmt->bind_param('i', $userID);
if (!$stmt->execute()) {
    echo json_encode(array('success' => false, 'message' => 'Failed to empty cart'));
    exit; // Stop further execution
}

// Return success response
echo json_encode(array('success' => true, 'message' => 'Order processed successfully'));
?>
