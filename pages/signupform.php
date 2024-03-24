<?php
require_once("../pages/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    $hashedMotdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);

    if ($bdd->connect_error) {
        die("Connection failed: " . $bdd->connect_error);
    }

    $checkEmailQuery = $bdd->prepare("SELECT * FROM utilisateur WHERE EMAILCLIENT = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $result = $checkEmailQuery->get_result();

    if ($result->num_rows > 0) {
        // Email already exists, redirect with error message
        header("Location: ../pages/signup.php?error=email_exists");
        exit();
    } else {
        // Email doesn't exist, proceed with user registration
        $stmt = $bdd->prepare("INSERT INTO utilisateur (CIVILITECLIENT, NOMCLIENT, EMAILCLIENT, MDPCLIENT, TELCLIENT, VILLECLIENT, ADRESSECLIENT) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $civilite, $nom, $email, $hashedMotdepasse, $telephone, $ville, $adresse);

        if ($stmt->execute() === TRUE) {
            $userId = $stmt->insert_id;
            
            $createCartQuery = $bdd->prepare("INSERT INTO client_cart (IDCLIENT) VALUES (?)");
            $createCartQuery->bind_param("i", $userId);
            if ($createCartQuery->execute() === TRUE) {
                // Registration successful, redirect to login page
                header("Location: ../pages/login.php");
                exit();
            } else {
                header("Location: ../pages/signup.php?error=cart_creation_failed");
                exit();
            }
        } else {
            header("Location: ../pages/signup.php?error=registration_failed");
            exit();
        }

        $stmt->close();
        $checkEmailQuery->close();
        $bdd->close();
    }
}
?>
