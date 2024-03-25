<?php
session_start();
require('../pages/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["productId"])) {
        $productId = $_POST["productId"];
        $quantity = 1;

        addToCart($productId, $quantity);
    } else {
        echo "Product ID is missing.";
    }
} else {
    echo "Form not submitted.";
}

function getProductFromCart($productId, $userId, $bdd)
{
    $query = "SELECT * FROM panier WHERE IDPROD = ? AND IDPANIER IN (SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?)";
    $stmt = $bdd->prepare($query);

    if ($stmt === false) {
        die("Error in preparing statement: " . $bdd->error);
    }

    $stmt->bind_param("ii", $productId, $userId);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}


function addToCart($productId, $quantity)
{
    if (!isset($_SESSION['userId'])) {
        echo '<script>alert("Vous devez se connecter !");
        window.history.go(-1);
        </script>';
        return;
    }

    global $bdd;
    $idClient = $_SESSION['userId'];

    $existingProduct = getProductFromCart($productId, $idClient, $bdd);

    if ($existingProduct) {
        $existingQuantity = $existingProduct['QUANTITE'];
        $newQuantity = $existingQuantity + $quantity;
        updateQuantity($productId, $newQuantity);
    } else {
        $cartQuery = "SELECT IDPANIER FROM client_cart WHERE IDCLIENT = ?";
        $cartStmt = $bdd->prepare($cartQuery);
        $cartStmt->bind_param('i', $idClient);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();

        if ($cartResult->num_rows == 0) {
            $createCartQuery = "INSERT INTO client_cart (IDCLIENT) VALUES (?)";
            $createCartStmt = $bdd->prepare($createCartQuery);
            $createCartStmt->bind_param('i', $idClient);
            if (!$createCartStmt->execute()) {
                echo "Error creating cart: " . $bdd->error;
                return;
            }
        }

        $cartRow = $cartResult->fetch_assoc();
        $cartId = $cartRow['IDPANIER'];

        // Fetch product details to calculate subtotal
        $productQuery = "SELECT PRIXPROD FROM produit WHERE IDPROD = ?";
        $productStmt = $bdd->prepare($productQuery);
        $productStmt->bind_param('i', $productId);
        $productStmt->execute();
        $productResult = $productStmt->get_result();

        if ($productResult->num_rows == 0) {
            echo "Product not found.";
            return;
        }

        $productRow = $productResult->fetch_assoc();
        $productPrice = $productRow['PRIXPROD'];
        $subtotal = $quantity * $productPrice;

        // Insert the product into the cart with the subtotal
        $insertQuery = "INSERT INTO panier (IDPANIER, IDPROD, QUANTITE, TOTAL) VALUES (?, ?, ?, ?)";
        $insertStmt = $bdd->prepare($insertQuery);
        $insertStmt->bind_param('iiid', $cartId, $productId, $quantity, $subtotal);

        if ($insertStmt->execute()) {
            echo "<script>window.history.go(-1);
            window.location.reload();
            </script>";
            exit();
        } else {
            echo "Error adding product to cart: " . $bdd->error;
        }

        $insertStmt->close();
        $cartStmt->close();
    }
}


function updateQuantity($productId, $increment)
{
    if (!isset($_SESSION['userId'])) {
        echo '<script>alert("Vous devez se connecter !");
        window.history.go(-1);
        </script>';
        return;
    }

    global $bdd;
    $idClient = $_SESSION['userId'];

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

    // Fetch the current quantity from the database
    $query = "SELECT QUANTITE FROM panier WHERE IDPANIER = ? AND IDPROD = ?";
    $stmt = $bdd->prepare($query);
    $stmt->bind_param('ii', $cartId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Product not found in cart.";
        return;
    }

    $row = $result->fetch_assoc();
    $currentQuantity = $row['QUANTITE'];

    // Calculate the new quantity based on the increment
    if ($increment > 0) {
        $newQuantity = $currentQuantity + 1; // Increment by 1
    } else {
        $newQuantity = max($currentQuantity - 1, 1); // Decrement by 1, but ensure it doesn't go below 1
    }

    // Update the quantity in the database
    $updateQuery = "UPDATE panier SET QUANTITE = ? WHERE IDPANIER = ? AND IDPROD = ?";
    $stmt = $bdd->prepare($updateQuery);
    $stmt->bind_param('iii', $newQuantity, $cartId, $productId);

    if ($stmt->execute()) {
        echo "<script>window.history.go(-1);
        window.location.reload();
        </script>";
        exit();
    } else {
        echo "Error updating quantity: " . $bdd->error;
    }

    $stmt->close();
}

?>
