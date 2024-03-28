<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=parfumerie;charset=utf8;', 'root', '');
$error_message = "";
if (isset($_POST['connexion'])) {
    if (!empty($_POST['emailclient']) && !empty($_POST['mdpclient'])) {
        $emailclient = htmlspecialchars($_POST['emailclient']);
        $mdpclient = $_POST['mdpclient'];
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE EMAILCLIENT = ?');
        $recupUser->execute(array($emailclient));
        $user = $recupUser->fetch();

        if ($user != false) {
            if (password_verify($mdpclient, $user['MDPCLIENT'])) {
                $id_client = $user['IDCLIENT'];
                $recupPrivilege = $bdd->prepare('SELECT IDPRIVILEGE FROM utilisateur_privilege WHERE IDCLIENT = ?');
                $recupPrivilege->execute(array($id_client));
                $privilege = $recupPrivilege->fetch();

                if  ($privilege && $privilege['IDPRIVILEGE'] == 1) {
                    // C'est un administrateur
                    $_SESSION['emailclient'] = $emailclient;
                    $_SESSION['userId'] = $id_client;
                    $_SESSION['admin'] = true;
                    header('Location: indexAdmin.php');
                    exit;
                }
                     else {// C'est un client
                    $_SESSION['emailclient'] = $emailclient;
                    $_SESSION['userId'] = $id_client;
                    $_SESSION['admin'] = false;
                    header('Location: welcome.php');
                    exit;
                }
                
             } else {
                $_SESSION['error_message'] = "*Mot de passe incorrect !";
            } 
        }else {
            $_SESSION['error_message'] = "*Utilisateur non trouvé !";
    } 
    }else {
        $_SESSION['error_message'] = "*Veuillez compléter tous les champs...";
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>se connecter - Parfumerie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../styles/stylesignup.css">
    <link rel="stylesheet" href="../styles/styleconnecter.css">



</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
    </div>
    <div class="main">
        <div class="row">
            <div class="col-lg-6 d-lg-block d-none image">
                <img src="../images/inscrire_connect.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-12 form">
                <div class="title">BON RETOUR!</div>
                <div class="subtitle">Vous n'avez pas un compte? <a href="../pages/signup.php">S'inscrire</a></div>
                <form action="login.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <?php
                            if (isset($_SESSION['error_message'])) {
                                echo '<div class="alert alert-danger error-message" role="alert">' . $_SESSION['error_message'] . '</div>';
                                unset($_SESSION['error_message']);
                            }
                            ?>
                            <input type="email" name="emailclient" autocomplete="email" class="form-control" placeholder="EMAIL*">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 input-group">
                            <input id="password" type="password" autocomplete="current-password" name="mdpclient" class="form-control" placeholder="MOT DE PASSE*">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="bi bi-eye-slash"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button type="submit" name="connexion" class="btn btn-primary">CONNEXION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.input-group-text');

            togglePassword.addEventListener('click', function() {
                const passwordField = document.getElementById('password');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    this.innerHTML = '<i class="bi bi-eye"></i>';
                } else {
                    passwordField.type = 'password';
                    this.innerHTML = '<i class="bi bi-eye-slash"></i>';
                }
            });
        });
    </script>





    <footer><?php include("../pages/footer.php"); ?></footer>
</body>

</html>