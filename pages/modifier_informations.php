<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_client = $_POST['id_client'];
    $civ = $_POST['civ'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    // Requête SQL pour mettre à jour les informations du client
    $sql_update_client = "UPDATE utilisateur SET CIVILITECLIENT = '$civ', EMAILCLIENT = '$email', TELCLIENT = '$tel', PAYS = '$pays', VILLECLIENT = '$ville', ADRESSECLIENT = '$adresse' WHERE IDCLIENT = $id_client";

    // Exécuter la requête SQL
    if (mysqli_query($bdd, $sql_update_client)) {
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: bienvenueCli.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour des informations: " . mysqli_error($bdd);
    }
} else {
    echo "Méthode de requête incorrecte.";
}
?>
