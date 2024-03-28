<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_categorie'], $_POST['nom_marque'], $_POST['nom_produit'], $_POST['prix'], $_POST['type'], $_POST['url_image'], $_POST['description'], $_POST['stock'])) {

        $id_categorie = "SELECT IDCAT FROM categories WHERE NOMCAT='" . $_POST['nom_categorie'] . "'";
        $result_id_categorie = mysqli_query($bdd, $id_categorie);
        $row = mysqli_fetch_assoc($result_id_categorie);
        $id_categorie = $row['IDCAT'];

        $nom_marque = $_POST['nom_marque'];
        $check_marque = "SELECT * FROM marque WHERE NOMMARQ='$nom_marque'";
        $result_check_marque = mysqli_query($bdd, $check_marque);

        if (mysqli_num_rows($result_check_marque) > 0) {
            $nom_produit = $_POST['nom_produit'];
            $prix = $_POST['prix'];
            $type = $_POST['type'];
            $url_image = $_POST['url_image'];
            $description = $_POST['description'];
            $stock = $_POST['stock'];

            $sql_add_produit = "INSERT INTO produit (IDCAT, NOMMARQ, NOMPROD, PRIXPROD, TYPEPROD, URLIMAGE, DESCPROD, STOCK) VALUES ('$id_categorie', '$nom_marque', '$nom_produit', '$prix', '$type', '$url_image', '$description', '$stock')";

            if (mysqli_query($bdd, $sql_add_produit)) {
                header("Location: indexAdmin.php");
                exit;
            } else {
                echo "Erreur lors de l'ajout du produit ! " . mysqli_error($bdd);
            }
        } else {
            echo "La marque n'existe pas, veuillez d'abord l'ajouter.";
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
} else {
    echo "";
}
?>
