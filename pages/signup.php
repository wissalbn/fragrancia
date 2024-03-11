<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'incrire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <?php
        include("../pages/header.php");
        ?>
    </div>
    <div class="main">
        <div class="row">
            <div class="col-6">
                <img src="../images/inscrire_connect.png" alt="">
            </div>
            <div class="col-6">
                <div class="title">BIENVENUE ENTRE NOUS</div>
                <div class="subtitle">Vous avez déjà un compte? <a href="../pages/login.php">Se connecter</a></div>
                <form action="signupform.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select name="civilite" id="civilite" class="form-select">
                                <option value="default">CIVILITE</option>
                                <option value="mme">Mme</option>
                                <option value="mlle">Mlle</option>
                                <option value="m">M</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="NOM*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="EMAIL*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="password" name="motdepasse" class="form-control" placeholder="MOT DE PASSE*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="tel" name="telephone" class="form-control" placeholder="NUMERO DE TELEPHONE">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="MAROC" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="ville" class="form-control" placeholder="VILLE*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" name="adresse" class="form-control" placeholder="ADRESSE*" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
</body>

</html>