<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_produit = $_POST["nom_produit"];
    // Récupérez les autres données du formulaire

    // Exécutez la requête d'insertion dans la base de données
    $sql_insert_produit = "INSERT INTO produit (NOMPROD, ...) VALUES ('$nom_produit', ...)";
    $resultat_insert_produit = mysqli_query($bdd, $sql_insert_produit);

    if ($resultat_insert_produit) {
        echo "Produit ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du produit : " . mysqli_error($bdd);
    }
}
?>
