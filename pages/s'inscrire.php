<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>se connecter - Parfumerie</title>
    <link rel="stylesheet" href="../styles/styleinscrire.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>

<body>
    <div class="main">
        <?php include("../pages/header.php"); ?>
        <div class="all row mt-1 main2"> 
            <div class="col-md-6 col-img">
                <div >
                    <img src="../images/inscrire_connect.png" class="image">
                </div>
            </div>
            <div class="col-md-6 col">
                <div class="c1">
                    <h1>BIENVENUE ENTRE NOUS !</h1>
                    <span> Vous avez déjà un compte? </span> <a href="seconnecter.php" class="conneceter">se connecter</a>
                    <form action="#"><div class="formulaire">
                        <input type="text" class="input-space"placeholder="CIVILITE">
                        <input type="text"  placeholder="NOM*"><br>
                        <input type="email" class="wan" placeholder="EMAIL*"><br>
                        <input type="password" class="wan"  placeholder="MOT DE PASSE*"><br>
                        <input type="tel" class="wan"  id="phone" name="phone"  pattern="[0-9]+" title="Veuillez entrer uniquement des chiffres" placeholder="NUMERO DE TELEPHONE*" required><br>
                        <input type="text" class="input-space" value="MAROC" readonly>
                        <input type="text" placeholder="VILLE*"><br>
                        <input type="text" class="wan" placeholder="ADRESSE*"><br>

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
