<?php
session_start();
require_once('connection.php');
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
    <title>Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/stylewelcome.css">
</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
        <div class="backlink">
            <a href="../pages/index.php">ACCUEIL </a>
            &gt;
            <a href="#"> MON COMPTE</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-start">MON COMPTE</h1>
            </div>
            <div class="col text-end">
                <form id="logoutForm" action="logout.php" method="post">
                    <button type="submit" name="logout" class="logout-btn btn btn-danger">Déconnecter</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Historique des commandes
                    </div>
                    <div class="card-body order">
                        <div class="table-responsive">
                            <?php
                            require_once('connection.php');
                            $userID = $_SESSION['userId'];
                            $query = "SELECT IDCOMMANDE, TOTAUX, DATECOMMANDE FROM commande WHERE IDCLIENT = ?";
                            $stmt = $bdd->prepare($query);
                            $stmt->bind_param('i', $userID);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                            ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Commande</th>
                                            <th>Total</th>
                                            <th>Date de Commande</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            $orderID = $row['IDCOMMANDE'];
                                            $total = $row['TOTAUX'];
                                            $date = $row['DATECOMMANDE'];
                                        ?>
                                            <tr>
                                                <td><?php echo $orderID; ?></td>
                                                <td><?php echo $total; ?>&euro;</td>
                                                <td><?php echo $date; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                                echo "Aucune commande pour le moment.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Informations utilisateur
                    </div>
                    <div class="card-body">
                        <?php
                        $userID = $_SESSION['userId'];
                        $query = "SELECT CIVILITECLIENT, NOMCLIENT, EMAILCLIENT FROM utilisateur WHERE IDCLIENT = ?";
                        $stmt = $bdd->prepare($query);
                        $stmt->bind_param('i', $userID);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $userInfo = $result->fetch_assoc();
                        ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="civilite"><?php echo $userInfo['CIVILITECLIENT']; ?>. <?php echo $userInfo['NOMCLIENT']; ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="email"><?php echo $userInfo['EMAILCLIENT']; ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="../pages/bienvenueCli.php">Modifier vos informations</a>
                                </div>

                            </div>
                                
                            
                        <?php
                        } else {
                            echo "Aucune information sur l'utilisateur n'est disponible.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer><?php include("../pages/footer.php"); ?> </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>