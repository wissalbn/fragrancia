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
    <link rel="stylesheet" href="../styles/styleBienCl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body> <?php include("../pages/header.php"); ?><br>
    <div class="container">

        <h2>BIENVENUE <strong><?php echo $user['NOMCLIENT']; ?></strong></h2>
        <div class="container1">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <br>
                    <h1>Modifier vos informations personnelles</h1><br>
                    <form action="modifier_informations.php" method="post">
                        <input type="hidden" name="id_client" value="<?php echo $user['IDCLIENT']; ?>">
                        <div class="mb-3">
                            <label for="civ" class="form-label">Civilité:</label>
                            <select class="form-select" id="civ" name="civ">
                                <option value="M." <?php if ($user['CIVILITECLIENT'] == 'M.') echo 'selected'; ?>>M.</option>
                                <option value="Mme" <?php if ($user['CIVILITECLIENT'] == 'Mme') echo 'selected'; ?>>Mme</option>
                                <option value="Mlle" <?php if ($user['CIVILITECLIENT'] == 'Mlle') echo 'selected'; ?>>Mlle</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['EMAILCLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone:</label>
                            <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo $user['TELCLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays:</label>
                            <input type="text" class="form-control" id="pays" name="pays" value="<?php echo $user['PAYS']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $user['VILLECLIENT']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $user['ADRESSECLIENT']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                    <form id="logoutForm" action="logout.php" method="post">
                        <button type="submit" name="logout" class="logout-btn">Logout</button>
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