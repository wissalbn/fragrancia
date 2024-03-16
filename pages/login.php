<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=parfumerie;charset=utf8;', 'root', '');
$error_message="";
if (isset($_POST['connexion'])) {
    if (!empty($_POST['emailclient']) && !empty($_POST['mdpclient'])) {
        $emailclient = htmlspecialchars($_POST['emailclient']);
        $mdpclient = $_POST['mdpclient'];
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE EMAILCLIENT = ?');
        $recupUser->execute(array($emailclient));
        $user = $recupUser->fetch();

        if ($user != false) {
            if (password_verify($mdpclient, $user['MDPCLIENT'])) {
                $_SESSION['userId'] = $user['IDCLIENT'];
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error_message'] = "*Email ou mot de passe incorrect !";
            }
        } else {
            $_SESSION['error_message'] = "*Utilisateur non trouvé !";
        }
    } else {
        $_SESSION['error_message']= "*Veuillez compléter tous les champs...";
    }

    $session_timeout = 7200; // 2 hours * 60 minutes * 60 seconds

    if (isset($_SESSION['last_activity']) && isset($_SESSION['emailclient'])) {
        $elapsed_time = time() - $_SESSION['last_activity'];

        if ($elapsed_time > $session_timeout) {
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['last_activity'] = time();
        }
    } else {
        header('Location: login.php');
        exit;
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
                    <div>
                        <img src="../images/inscrire_connect.png" class="img-fluid">
                    </div>
                </div>

                <div class="col-md-6 col">
                    <div class="c1">
                        <h1>BON RETOUR!</h1>
                        <span> Vous n’avez pas un compte? </span> <a href="signup.php" class="inscrit">s'inscrire</a>
                        <form method="POST" action="login.php">
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
                        
                        if (isset($_SESSION['error_message'])) {
                            echo '<span class="error-message">' . $_SESSION['error_message'] . '</span>';
                            unset($_SESSION['error_message']);
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