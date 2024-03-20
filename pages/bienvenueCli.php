<?php
session_start();
include("connection.php");

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['emailclient'])) {
    $emailclient = $_SESSION['emailclient'];

    // Récupérer les informations du client depuis la base de données
    $stmt = $bdd->prepare('SELECT * FROM utilisateur WHERE EMAILCLIENT = ?');
    $stmt->bind_param('s', $emailclient);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        ?>
 <!DOCTYPE html>
 <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Vos informations personnelles</title>
            <link rel="stylesheet" href="../styles/styleBienCl.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            

        </head>
        <body>
            <div class="contenaire">
            <?php include("../pages/header.php"); ?><br>
           <h2> BIENVENUE <strong><?php echo $user['NOMCLIENT']; ?></strong></h2>
            <div class="container1 ">
               <div class="row">
                   <div class="col-md-8 mx-auto">
           <br> <h1>Vos informations personnelles</h1><br>
           
            <table class=" table-spacing " >
    <tr>
        <td><strong>Civilité:</strong></td>
        <td><?php echo $user['CIVILITECLIENT']; ?></td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td><?php echo $user['EMAILCLIENT']; ?></td>
    </tr>
    <tr>
        <td><strong>Téléphone:</strong></td>
        <td><?php echo $user['TELCLIENT']; ?></td>
    </tr>
    <tr>
        <td><strong>Pays:</strong></td>
        <td><?php echo $user['PAYS']; ?></td>
    </tr>
    <tr>
        <td><strong>Adresse:</strong></td>
        <td><?php echo $user['ADRESSECLIENT']; ?></td>
    </tr>
</table><br><br>

            </div>
                 </div>
                    </div>
    </div>
            <footer>
            <?php include("../pages/footer.php"); ?>
        </footer>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
} else {
    echo "Vous n'êtes pas connecté.";
}
?>
