<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styledisplay.css">

</head>

<body>
    <div class="header">
        <?php
        require_once('../pages/connection.php');
        include("../pages/header.php");

        if (isset($_GET["product_id"])) {
            $product_id = $_GET["product_id"];
            $query = "SELECT * FROM produit WHERE IDPROD = $product_id";
            $result = mysqli_query($bdd, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $product = mysqli_fetch_assoc($result);

        ?>
                <hr>
                <div class="backlink">
                    <a href="../pages/index.php">ACCUEIL </a>
                    &gt;
                    <a href="<?php
                                if ($product['IDCAT'] == 1)
                                    echo "../pages/parfumfemme.php";
                                elseif ($product['IDCAT'] == 2)
                                    echo "../pages/parfumhomme.php";
                                else
                                    echo "../pages/corpsbain.php";
                                ?>
            ">
                        <?php
                        if ($product['IDCAT'] == 1)
                            echo "PARFUM FEMME";
                        elseif ($product['IDCAT'] == 2)
                            echo "PARFUM HOMME";
                        else
                            echo "COPRS & BAIN";
                        ?>
                    </a>
                    &gt;
                    <a class="upcase" href="#"><?= $product['NOMPROD']; ?></a>
                </div>
    </div>
    <div class="main">
        <div class="row gx-4">

            <div class="col-md-6">
                <div class="img-container">
                    <img src="<?= $product['URLIMAGE'] ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="brand"> <a href="#"><?= $product['NOMMARQ']; ?></a> </div>
                <div class="name"><?= $product['NOMPROD']; ?></div>
                <div class="type"><?= $product['TYPEPROD']; ?></div>
                <div class="container-fluid desc"><?= $product['DESCPROD']; ?></div>
                <div class="price"><?= $product['PRIXPROD']; ?> &euro;</div>
                <div class="buy"><button class="buy">ACHETER</button></div>
            </div>


    <?php
            } else {
                echo "<p>Produit non trouvé</p>";
            }

            mysqli_close($bdd);
        } else {
            echo "<p>Product ID not provided</p>";
        }
    ?>



        </div>
    </div>
    <footer><?php include("../pages/footer.php") ?></footer>

</body>

</html>