<?php

session_start();


function getCartItemCount() {
    $cartItemCount = 0;
    require_once '../pages/connection.php';

    if (isset($_SESSION['userId'])) {

        $userId = $_SESSION['userId'];
        $sql = "SELECT COUNT(*) AS item_count FROM panier AS pa
        JOIN client_cart AS cc ON pa.IDPANIER = cc.IDPANIER
        WHERE cc.IDCLIENT = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $cartItemCount = $row['item_count'];
        }
    }

    return $cartItemCount;
}

$cartItemCount = getCartItemCount();
header('Content-Type: application/json');
echo json_encode(['count' => $cartItemCount]);
exit();
?>
