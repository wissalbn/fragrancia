
<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si les données du formulaire sont soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if (isset($_POST['id_client'], $_POST['total'], $_POST['date_commande'])) {
        // Récupérer les données du formulaire
        $id_client = $_POST['id_client'];
        $total = $_POST['total'];
        $date_commande = date('Y-m-d', strtotime($_POST['date_commande']));

        // Requête SQL pour insérer la nouvelle commande
        $sql_insert_commande = "INSERT INTO commande (IDCLIENT, TOTAUX, DATECOMMANDE) VALUES ('$id_client', '$total', '$date_commande')";

        // Exécuter la requête SQL
        if (mysqli_query($bdd, $sql_insert_commande)) {
            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: commande.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout de la commande: " . mysqli_error($bdd);
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1>Ajouter un client</h1>
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
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
        </div>
    </div>
</body>
</html>



