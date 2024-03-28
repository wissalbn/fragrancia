
<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Définir des variables pour les valeurs par défaut du formulaire
$id_client = $nom = $civilite = $email = $telephone = $pays = $ville = $adresse = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $civilite = $_POST["civilite"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $adresse = $_POST["adresse"];
    $mdp = $_POST["mdp"];

    // Hasher le mot de passe
    $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

    // Requête SQL pour insérer le nouveau client dans la base de données
    $sql_insert_client = "INSERT INTO utilisateur (NOMCLIENT, CIVILITECLIENT, EMAILCLIENT, TELCLIENT, PAYS, VILLECLIENT, ADRESSECLIENT, MDPCLIENT) VALUES ('$nom', '$civilite', '$email', '$telephone', '$pays', '$ville', '$adresse', '$hashed_mdp')";

    // Exécuter la requête SQL
    if (mysqli_query($bdd, $sql_insert_client)) {
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: indexAdmin.php");
        exit;
    } else {
        echo "Erreur lors de l'ajout du client: " . mysqli_error($bdd);
    }
}

?>