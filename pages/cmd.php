<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si un ID de commande est passé pour suppression
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // Requête SQL pour supprimer la commande avec l'ID spécifié
    $sql_delete_commande = "DELETE FROM commande WHERE IDCOMMANDE = $delete_id";
    mysqli_query($bdd, $sql_delete_commande);
}

// Requête SQL pour récupérer les commandes
$sql_commande = "SELECT * FROM commande";
$resultat_commande = mysqli_query($bdd, $sql_commande);


if ($resultat_commande && mysqli_num_rows($resultat_commande) > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Commande</th><th>ID Client</th><th>Total</th><th>Date de commande</th><th>Actions</th></tr></thead>";
   
    echo "<tbody>";
    while ($row_commande = mysqli_fetch_assoc($resultat_commande)) {
        echo "<tr><td>" . $row_commande["IDCOMMANDE"] . "</td><td>" . $row_commande["IDCLIENT"] . "</td><td>" . $row_commande["TOTAUX"] . "</td><td>" . date('d/m/Y', strtotime($row_commande["DATECOMMANDE"])) .  "</td>";
        echo "<td><a href='edit_commande.php?id=" . $row_commande["IDCOMMANDE"] . "' class='btn btn-primary bn'>Éditer</a> ";
        echo "<a href='?delete_id=" . $row_commande["IDCOMMANDE"] . "' class='btn btn-danger bn'>Supprimer</a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Aucune commande trouvée.";
}
?>
