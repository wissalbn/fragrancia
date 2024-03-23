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


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Ajouter Produit</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="id_categorie">ID Catégorie:</label>
            <input type="text" class="form-control" id="id_categorie" name="id_categorie">
        </div>
        <div class="form-group">
            <label for="nom_marque">Nom Marque:</label>
            <input type="text" class="form-control" id="nom_marque" name="nom_marque">
        </div>
        <div class="form-group">
            <label for="nom_produit">Nom Produit:</label>
            <input type="text" class="form-control" id="nom_produit" name="nom_produit">
        </div>
        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control" id="prix" name="prix">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>
        <div class="form-group">
            <label for="url_image">Image URL:</label>
            <input type="text" class="form-control" id="url_image" name="url_image">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
