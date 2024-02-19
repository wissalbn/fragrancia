<?php require_once 'connection.php';
$ids = [173, 258, 296, 310];
$ids_string = implode(',', $ids); 
$sql="SELECT * FROM produit WHERE IDPROD IN ($ids_string)";
$all_product=$bdd->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/styleindex.css">
</head>

<body>
    <div class="container-header">
        <?php include("../pages/header.php"); ?>

        <div class="header-content">
            <div class="title">
                <h1>Laissez-vous tenter par l’essence du luxe</h1>
            </div>
            <div class="subtitle"><p>Chez Fragrancia, nous pensons que le parfum est une forme d'art qui élève les sens. Explorez notre exquise collection de parfums conçus pour évoquer des émotions et des souvenirs.</p></div>
        </div>
    </div>
    <main>
        <h1>NOUVEL ARRIVAGE</h1>
        <?php
        while($row=mysqli_fetch_assoc($all_product)){

        ?>
        <div class="card">
            <div class="image">
                <img src="<?php echo $row["URLIMAGE"];?>" alt="">
            </div>
            <div class="name"><?php echo $row["NOMPROD"];?></div>
            <div class="brand"><?php echo $row["NOMMARQ"];?></div>
            <div class="price"><?php echo $row["PRIXPROD"];?></div>
            <button class="discover">DECOUVRIR</button>
        </div>
        <?php } ?>
    </main>
    <footer><?php include("../pages/footer.php") ?></footer>
    
</body>

</html>