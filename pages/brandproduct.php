<?php
if (isset($_GET["brand"])) {
    $brand_name = urldecode($_GET["brand"]);
    require_once('connection.php');

    $query = "SELECT * FROM produit WHERE NOMMARQ = '$brand_name'";
    $result = mysqli_query($bdd, $query);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $brand_name ?></title>
        <link rel="stylesheet" href="../styles/sylebrandprod.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>
        <div class="header">
            <?php include("../pages/header.php"); ?>
            <hr>
            <div class="backlink">
                <a href="../pages/index.php">ACCUEIL </a>
                &gt;
                <a href="../pages/brands.php"> MARQUES</a>
                &gt;
                <a class="upcase" href="#"><?= $brand_name ?></a>
            </div>
        </div>
        <div class="main">
            <div class="row">
                <div class="col-12">
                    <h1>produits de <?= $brand_name ?></h1>
                </div>
            </div>
            <div class="row">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($count % 4 == 0) {
                            echo '</div><div class="row">';
                        }
                ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="product-card">
                            <form class="addToCartForm" action="../pages/cartform.php" method="POST">
                                        <input type="hidden" name="action" value="addToCart">
                                        <input type="hidden" name="productId" value="<?php echo $row["IDPROD"]; ?>">
                            <a class="linkdisplay" href="../pages/productdisplay.php?product_id=<?php echo $row["IDPROD"]; ?>">
                                <div class="image">
                                    <img src="<?php echo $row["URLIMAGE"]; ?>" alt="">
                                </div>
                                <div class="name"><?php echo $row["NOMPROD"]; ?></div>
                                <div class="brand"><?php echo $row["NOMMARQ"]; ?></div>
                                <div class="price"><?php echo $row["PRIXPROD"]; ?>&euro;</div>
                                <button class="discover" data-product-id="<?php echo $row["IDPROD"]; ?>">AJOUTER AU PANIER</button>
                            </a>
                            </form>
                            </div>
                        </div>
                <?php
                        $count++;
                    }
                    mysqli_close($bdd);
                } else {
                    echo "<p>Aucun produit pour: $brand_name</p>";
                }
                ?>
            </div>
        </div>
        <footer><?php include("../pages/footer.php");?></footer>

    </body>

    </html>
<?php } else {
    echo "<p>Paramètre de la marque non fournie</p>";
} ?>

<script src="../js/jsproduit.js"></script>

