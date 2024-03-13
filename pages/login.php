<?php
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['username']) AND empty($_POST['password']) ){
        $error_message = "*Veuillez compléter tous les champs...";
    }
else{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host= "localhost";
    $dbusername= "root";
    $dbpassword = "";
    $dbname = "parfumerie";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);

    }

    $query = "SELECT *FROM utilisateur WHERE EMAILCLIENT='$username' AND MDPCLIENT='$password'";

    $result = $conn->query($query);
    if($result->num_rows == 1){
        header("Location: index.php");

    }
    else{
        $error_message = "*Email ou mot de passe est incorrect !";
        
    }
    $conn->close();

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
                        <span> Vous n’avez pas un compte? </span> <a href="s'inscrire.php" class="inscrit">s'inscrire</a>
                        <form method="POST" action="">
                            <div class="formulaire">
                                <input type="text" name="username" placeholder="EMAIL" autocomplete="off"><br>
                                <div style="position: relative;">
                                <input type="password" name="password" placeholder="MOT DE PASSE*" autocomplete="off" id="password-input">
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
