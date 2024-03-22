<?php
include("connection.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produit = $_GET['id'];
    
    // Requête SQL pour supprimer le produit avec l'ID spécifié
    $sql_delete_produit = "DELETE FROM produit WHERE IDPROD = $id_produit";
    
    if (mysqli_query($bdd, $sql_delete_produit)) {
        // Redirection vers la page des produits après suppression
        header("Location: adminPanel.php#produit");
        exit;
    } else {
        echo "Erreur lors de la suppression du produit: " . mysqli_error($bdd);
    }
} else {
    echo "ID de produit non spécifié.";
}
?>
