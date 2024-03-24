<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if (isset($_POST['id_categorie'], $_POST['nom_marque'], $_POST['nom_produit'], $_POST['prix'], $_POST['type'], $_POST['url_image'], $_POST['description'], $_POST['stock'])) {
        // Récupérer les données du formulaire
        $id_categorie = $_POST['id_categorie'];
        $nom_marque = $_POST['nom_marque'];
        $nom_produit = $_POST['nom_produit'];
        $prix = $_POST['prix'];
        $type = $_POST['type'];
        $url_image = $_POST['url_image'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];

        // Requête SQL pour ajouter le produit
        $sql_add_produit = "INSERT INTO produit (IDCAT, NOMMARQ, NOMPROD, PRIXPROD, TYPEPROD, URLIMAGE, DESCPROD, STOCK) VALUES ('$id_categorie', '$nom_marque', '$nom_produit', '$prix', '$type', '$url_image', '$description', '$stock')";

        // Exécuter la requête SQL
        if (mysqli_query($bdd, $sql_add_produit)) {
            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: produits.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout du produit ! " ;
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
} else {
    echo "";
}
?>


