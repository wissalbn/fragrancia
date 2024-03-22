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
echo'<button class="modal-btn modal-trigger bn">Ajouter Commande</button>';

if ($resultat_commande && mysqli_num_rows($resultat_commande) > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Commande</th><th>ID Client</th><th>Total</th><th>Date de commande</th><th>Actions</th></tr></thead>";
   
    echo "<tbody>";
    while ($row_commande = mysqli_fetch_assoc($resultat_commande)) {
        echo "<tr><td>" . $row_commande["IDCOMMANDE"] . "</td><td>" . $row_commande["IDCLIENT"] . "</td><td>" . $row_commande["TOTAUX"] . "</td><td>" . date('d/m/Y', strtotime($row_commande["DATECOMMANDE"])) .  "</td>";
        echo "<td><a href='edit_commande.php?id=" . $row_commande["IDCOMMANDE"] . "' class='btn btn-primary'>Éditer</a> ";
        echo "<a href='?delete_id=" . $row_commande["IDCOMMANDE"] . "' class='btn btn-danger'>Supprimer</a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Aucune commande trouvée.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel="stylesheet" href="../styles/styleCommande.css">
   
</head>
<body>
    <div class="modal-container">

<div class="overlay modal-trigger"></div>

<div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
  <button 
  aria-label="close modal"
  class="close-modal modal-trigger">X</button>
  <h1>Ajouter Commande</h1>
    <form action="add_commande.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="id_client" name="id_client" placeholder="ID Client">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="total" name="total" placeholder="Total">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="date_commande" name="date_commande" placeholder="Date de commande">
        </div>
        <button type="submit" class="btn btn-primary ">Ajouter</button>
    </form>
</div>

</div>

<script src="app.js"></script>

</body>
</html>
