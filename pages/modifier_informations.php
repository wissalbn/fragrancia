<?php
session_start();
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_client = $_POST['id_client'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    $sql_update_client = "UPDATE utilisateur SET EMAILCLIENT = '$email', TELCLIENT = '$tel', VILLECLIENT = '$ville', ADRESSECLIENT = '$adresse' WHERE IDCLIENT = $id_client";

    if (mysqli_query($bdd, $sql_update_client)) {
        echo('<script>alert("Vos informations ont bien été modifié!");');
        echo('window.location.href = "../pages/welcome.php";</script>');
    }else {
        echo "Erreur lors de la mise à jour des informations: " . mysqli_error($bdd);
    }
} else {
    echo "Méthode de requête incorrecte.";
}
?>
