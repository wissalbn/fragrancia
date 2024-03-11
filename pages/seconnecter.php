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
        <div class="all row mt-1 main2"> <!-- Ajout de la classe mt-1 pour réduire l'espace -->
            <div class="col-md-6 col-img">
                <div >
                    <img src="../images/inscrire_connect.png" class="image">
                </div>
            </div>
            <div class="col-md-6 col">
                <div class="c1">
                    <h1>BON RETOUR!</h1>
                    <span> Vous n’avez pas un compte? </span> <a href="s'inscrire.php" class="inscrit">s'inscrire</a>
                    <form action="#"><div class="formulaire">
                        <input type="text" placeholder="EMAIL"><br>
                        <input type="password" placeholder="MOT DE PASSE*"><br>
                        <button type="submit" class="btnc">CONNEXION</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include("../pages/footer.php"); ?>
    </footer>

</body>

</html>
