<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'incrire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/stylesignup.css">
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
                <div class="title">BIENVENUE ENTRE NOUS</div>
                <div class="subtitle">Vous avez déjà un compte? <a href="../pages/login.php">Se connecter</a></div>
                <form action="signupform.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="civilite" id="civilite" class="form-select">
                                <option value="default">CIVILITE</option>
                                <option value="mme">Mme</option>
                                <option value="mlle">Mlle</option>
                                <option value="m">M</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="nom" class="form-control" placeholder="NOM*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="EMAIL*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="password" name="motdepasse" class="form-control" placeholder="MOT DE PASSE*" minlength="8" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="tel" name="telephone" class="form-control" placeholder="NUMERO DE TELEPHONE">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="MAROC" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="ville" class="form-control" placeholder="VILLE*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" name="adresse" class="form-control" placeholder="ADRESSE*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
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
