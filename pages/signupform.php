<?php
require_once("../pages/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    // Hash the password
    $hashedMotdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    // Check if connection to the database was successful
    if ($bdd->connect_error) {
        die("Connection failed: " . $bdd->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $bdd->prepare("INSERT INTO utilisateur (CIVILITECLIENT, NOMCLIENT, EMAILCLIENT, MDPCLIENT, TELCLIENT, VILLECLIENT, ADRESSECLIENT) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $civilite, $nom, $email, $hashedMotdepasse, $telephone, $ville, $adresse);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        header("Location: ../pages/login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $bdd->close();
}
?>
