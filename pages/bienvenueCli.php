<?php
session_start();
include("connection.php");

if (isset($_SESSION['userId'])) {
    $userid = $_SESSION['userId'];

    $stmt = $bdd->prepare('SELECT * FROM utilisateur WHERE IDCLIENT = ?');
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier vos informations personnelles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styleBienCl.css">
</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
        <div class="backlink">
            <a href="../pages/index.php">ACCUEIL </a>
            &gt;
            <a href="../pages/welcome.php"> MON COMPTE</a>
            &gt;
            <a href="#"> MODIFIER INFORMATIONS</a>
        </div>
    </div>
    <div class="container">

        <div class="container1">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <br>
                    <h1>Modifier vos informations personnelles</h1><br>
                    <form action="modifier_informations.php" method="post">
                        <input type="hidden" name="id_client" value="<?php echo $user['IDCLIENT']; ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['EMAILCLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone:</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $user['TELCLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $user['VILLECLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $user['ADRESSECLIENT']; ?>">
                        </div>
                        <button type="submit" class="btn">Modifier</button>
                    </form>
                </div>
                <br><br>

            </div>
        </div>

    </div>
    <footer>
        <?php include("../pages/footer.php"); ?>
    </footer>
</body>

</html>