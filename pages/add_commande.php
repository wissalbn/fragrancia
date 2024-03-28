<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_client'], $_POST['total'], $_POST['date_commande'])) {
        $nom_client = $_POST['nom_client'];
        $total = $_POST['total'];
        $date_commande = date('Y-m-d', strtotime($_POST['date_commande']));
        $sql_id_client = "SELECT IDCLIENT FROM utilisateur WHERE NOMCLIENT='$nom_client'";
        $result_id_client = mysqli_query($bdd, $sql_id_client);

        if ($result_id_client && mysqli_num_rows($result_id_client) > 0) {
            $row = mysqli_fetch_assoc($result_id_client);
            $id_client = $row['IDCLIENT'];

            $sql_insert_commande = "INSERT INTO commande (IDCLIENT, TOTAUX, DATECOMMANDE) VALUES ('$id_client', '$total', '$date_commande')";

            if (mysqli_query($bdd, $sql_insert_commande)) {
                header("Location: indexAdmin.php");
                exit;
            } else {
                echo "Erreur lors de l'ajout de la commande: " . mysqli_error($bdd);
            }
        } else {
            echo "Erreur: client non trouvé.";
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
} 
?>
