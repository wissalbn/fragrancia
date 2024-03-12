<?php
session_start();
$dbb = new PDO('mysql:host=localhost;dbname=parfumerie;charset=utf8;', 'root', '');


if(isset($_POST['connexion'])){
    // Vérifier si les champs sont remplis
    if(!empty($_POST['emailclient']) AND !empty($_POST['mdpclient']) ){
        $emailclient = htmlspecialchars($_POST['emailclient']); 
        $mdpclient = sha1($_POST['mdpclient']);

        
        $recupUser = $dbb->prepare('SELECT * FROM utilisateur WHERE emailclient= ? and mdpclient = ?');
        $recupUser->execute(array($emailclient, $mdpclient));

      
        if($recupUser->rowCount() > 0){
            $_SESSION['emailclient'] = $emailclient;
            $_SESSION['mdpclient'] = $mdpclient;
            header('Location: index.php');
            exit; 
        } else {
            $error_message = "*Email ou mot de passe est incorrect !";
        }
    } else {
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
                <div class="col-md-6 col-img">
                    <div >
                        <img src="../images/inscrire_connect.png" class="img-fluid">
                    </div>
                </div>
            
                <div class="col-md-6 col">
<<<<<<< HEAD:pages/seconnecter.php
                    <div class="c1">
                        <h1>BON RETOUR!</h1>
                        <span> Vous n’avez pas un compte? </span> <a href="s'inscrire.php" class="inscrit">s'inscrire</a>
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
=======
                <div class="c1">
                    <h1>BON RETOUR!</h1>
                    <span> Vous n’avez pas un compte? </span> <a href="../pages/signup.php" class="inscrit">s'inscrire</a>
                    <form action="#"><div class="formulaire">
                        <input type="text" placeholder="EMAIL"><br>
                        <input type="password" placeholder="MOT DE PASSE*"><br>
                        <button type="submit" class="btnc">CONNEXION</button></div>
                    </form>
>>>>>>> 54b532aa11bf7bde42f398d2fef78f101daf61cf:pages/login.php
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
