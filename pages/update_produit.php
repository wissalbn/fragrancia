<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];
    $id_categorie = $_POST['nom_categorie'];
    $nom_marque = $_POST['nom_marque'];
    $nom_produit = $_POST['nom_produit'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];
    $url_image = $_POST['image'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    
    $id_categorie = mysqli_real_escape_string($bdd, $id_categorie);
    $nom_marque = mysqli_real_escape_string($bdd, $nom_marque);
    $nom_produit = mysqli_real_escape_string($bdd, $nom_produit);
    $prix = mysqli_real_escape_string($bdd, $prix);
    $type = mysqli_real_escape_string($bdd, $type);
    $url_image = mysqli_real_escape_string($bdd, $url_image);
    $description = mysqli_real_escape_string($bdd, $description);
    $stock = mysqli_real_escape_string($bdd, $stock);

    $sql_update_produit = "UPDATE produit SET IDCAT='$id_categorie', NOMMARQ='$nom_marque', NOMPROD='$nom_produit', PRIXPROD='$prix', TYPEPROD='$type', URLIMAGE='$url_image', DESCPROD='$description', STOCK='$stock' WHERE IDPROD='$id_produit'";

    if (mysqli_query($bdd, $sql_update_produit)) {
        header("Location: indexAdmin.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour du produit : " . mysqli_error($bdd);
    }
} else {
    echo "Erreur : Les données du formulaire ne sont pas complètes.";
}
?>
