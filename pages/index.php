<?php require_once 'connection.php';
$ids = [170, 259, 290, 282, 316, 313, 315];
$ids_string = implode(',', $ids);
$sql = "SELECT * FROM produit WHERE IDPROD IN ($ids_string)";
$all_product = $bdd->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../styles/styleindex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-header">
        <?php include("../pages/header.php"); ?>

        <div class="header-content">
            <div class="title">
                <h1>Laissez-vous tenter par l’essence du luxe</h1>
            </div>
            <div class="subtitle">
                <p>Chez Fragrancia, nous pensons que le parfum est une forme d'art qui élève les sens. Explorez notre exquise collection de parfums conçus pour évoquer des émotions et des souvenirs.</p>
            </div>
            <button class="discover" id="parfumfemme">DECOUVRIR</button>
        </div>
    </div>

    <h1 class="section-title">NOUVEL ARRIVAGE</h1>
    <div class="product-scroll-container">
        <button class="scroll-button left"><i class="fa-solid fa-angle-left fa-lg" style="color: #142139;"></i></button>
        <div class="product-container">

            <?php
            while ($row = mysqli_fetch_assoc($all_product)) {

            ?>
                <div class="product-card">
                <a class="linkdisplay" href="../pages/productdisplay.php?product_id=<?php echo $row["IDPROD"]; ?>">
                    <div class="image">
                        <img src="<?php echo $row["URLIMAGE"]; ?>" alt="">
                    </div>
                    <div class="name"><?php echo $row["NOMPROD"]; ?></div>
                    <div class="brand"><?php echo $row["NOMMARQ"]; ?></div>
                    <div class="price"><?php echo $row["PRIXPROD"]; ?>€</div>
                    <button class="discover">DECOUVRIR</button>
                </a>

                </div>
            <?php } ?>

        </div>
        <button class="scroll-button right"><i class="fa-solid fa-angle-right fa-beat-fade fa-lg" style="color: #17243a;"></i></button>
        <script src="../js/jsindex.js"></script>
    </div>
    <h1 class="section-title">OFFRES DU MOMENT</h1>
    <div class="row-offres">
        <img src="../images/offre.webp" alt="" class="offre">
        <img src="../images/offre2.webp" alt="" class="offre">
        <img src="../images/offre3.webp" alt="" class="offre">
    </div>

    <footer><?php include("../pages/footer.php") ?></footer>
    <script>
        document.getElementById("parfumfemme").addEventListener("click", function() {
            window.location.href = "../pages/parfumfemme.php";
        });
    </script>

</body>

</html>