
<?php
// Inclure le fichier de connexion à la base de donnée
include("connection.php");

// Vérifier si un ID de commande est passé pour l'édition
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_commande = $_GET['id'];

    // Requête SQL pour récupérer les informations de la commande avec l'ID spécifié
    $sql_select_commande = "SELECT * FROM commande WHERE IDCOMMANDE = $id_commande";
    $resultat_select_commande = mysqli_query($bdd, $sql_select_commande);

    if ($resultat_select_commande && mysqli_num_rows($resultat_select_commande) > 0) {
        $row_commande = mysqli_fetch_assoc($resultat_select_commande);
        // Afficher un formulaire pré-rempli avec les informations de la commande
        ?>
        <?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si les données du formulaire sont soumise
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if (isset($_POST['id_commande'], $_POST['id_client'], $_POST['total'], $_POST['date_commande'])) {
        // Récupérer les données du formulaire
        $id_commande = $_POST['id_commande'];
        $id_client = $_POST['id_client'];
        $total = $_POST['total'];
        $date_commande = date('Y-m-d', strtotime($_POST['date_commande']));

        // Requête SQL pour mettre à jour la commande
        $sql_update_commande = "UPDATE commande SET IDCLIENT = '$id_client', TOTAUX = '$total', DATECOMMANDE = '$date_commande' WHERE IDCOMMANDE = $id_commande";

        // Exécuter la requête SQL
        if (mysqli_query($bdd, $sql_update_commande)) {
            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: commande.php");
            exit;
        } else {
            echo "Erreur lors de la mise à jour de la commande: " . mysqli_error($bdd);
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
            <title>Éditer Commande</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                .btn-primary {
                      background-color: rgba(224, 181, 148, 1);;
        
                       border:none !important;
                    }
                       .btn-primary:hover {
                      background-color: #3b3a39;
            
                       }
                       .btn-primary:active{
                        background-color: #3b3a39;
                       }
                form{
                      width:50%;

                     }
                     
            </style>
        </head>
        <body>
            
            <div class="container">
                <h1>Éditer Commande</h1> 
                <form action="" method="post">
                    <input type="hidden" name="id_commande" value="<?php echo $row_commande['IDCOMMANDE']; ?>">
                    <div class="form-group">
                        <label for="id_client">ID Client:</label>
                        <input type="text" class="form-control" id="id_client" name="id_client" value="<?php echo $row_commande['IDCLIENT']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input type="text" class="form-control" id="total" name="total" value="<?php echo $row_commande['TOTAUX']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="date_commande">Date de commande:</label>
                        <input type="date" class="form-control" id="date_commande" name="date_commande" value="<?php echo date('d/m/Y', strtotime($row_commande['DATECOMMANDE'])); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button> <a href="commande.php" class="retour"  style="color: red;  margin-left: 5px;"><-retour</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Aucune commande trouvée avec l'ID spécifié.";
    }
} else {
    echo "ID de commande non spécifié.";
}
?>
