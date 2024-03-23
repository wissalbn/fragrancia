<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si un ID de client est passé pour suppression
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_client = $_GET['id'];
    // Requête SQL pour supprimer le client avec l'ID spécifié
    $sql_delete_client = "DELETE FROM utilisateur WHERE IDCLIENT = $id_client";
    mysqli_query($bdd, $sql_delete_client);

    // Rediriger vers une page de succès ou afficher un message de succès
    header("Location: adminPanel.php#client");
    exit;
} else {
    echo "ID de client non spécifié.";
}
?>
