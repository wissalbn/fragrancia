<?php
session_start();
require_once("../pages/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
    // Retrieve form data
    $emailclient = $_POST['emailclient'];
    $mdpclient = $_POST['mdpclient'];

    // Check if the email and password fields are not empty
    if (!empty($emailclient) && !empty($mdpclient)) {
        // Hash the password
        $hashedMotdepasse = password_hash($mdpclient, PASSWORD_DEFAULT);

        // Prepare and execute SQL statement to fetch user data
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE EMAILCLIENT= ? and MDPCLIENT = ?');
        $recupUser->bind_param('ss', $emailclient, $hashedMotdepasse);
        $recupUser->execute();

        // Get the result
        $result = $recupUser->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // User found, set session variables and redirect to index.php
            $_SESSION['emailclient'] = $emailclient;
            $_SESSION['mdpclient'] = $hashedMotdepasse;
            header('Location: index.php');
            exit;
        } else {
            // User not found, set error message
            $error_message = "*Email ou mot de passe est incorrect !";
        }
    } else {
        // Fields are empty, set error message
        $error_message = "*Veuillez compléter tous les champs...";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>se connecter - Parfumerie</title>
    <link rel="stylesheet" href="../styles/styleconnecter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>

<body>
    <div class="main">
        <?php include("../pages/header.php"); ?>
        <div class="all row mt-1 main2">
            <div class="row">
                <div class="col-md-6 col-img mt-0">
                    <div >
                        <img src="../images/inscrire_connect.png" class="img-fluid">
                    </div>
                </div>
            
                <div class="col-md-6 col">
                    <div class="c1">
                        <h1>BON RETOUR!</h1>
                        <span> Vous n’avez pas un compte? </span> <a href="../pages/signup.php" class="inscrit">s'inscrire</a>
                        <form method="POST" action="">
                            <div class="formulaire">
                                <input type="text" name="emailclient" placeholder="EMAIL" autocomplete="off"><br>
                                <div style="position: relative;">
                                <input type="password" name="mdpclient" placeholder="MOT DE PASSE*" autocomplete="off" id="password-input">
                                <span class="password-toggle" id="password-toggle">&#x1f441;</span>
                            </div><br>
                                <button type="submit" name="connexion" class="btnc">CONNEXION</button>
                            </div>
                        </form>
                        <?php
                        
                        if(isset($error_message)){
                            echo '<span class="error-message">' . $error_message . '</span>';
                        }
                        ?>
                    </div>
                
            </div>
        </div>
    </div>

    <footer>
        <?php include("../pages/footer.php"); ?>
    </footer>
    <script>
document.getElementById("password-toggle").addEventListener("click", function() {
    var passwordInput = document.getElementById("password-input");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
});
</script>
</body>

</html>
