<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>corps et bain</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styleproducts.css">
</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
        <div class="backlink">
            <a href="../pages/index.php">ACCUEIL </a>
            &gt;
            <a href="#"> CORPS & BAIN</a>
        </div>
    </div>
    <div class="main">
        <div class="row">
            <div class="col-2">
                <div class="filter">
                    <form action="" method="get">
                        <div class="filter-title">MARQUES <button type="submit" class="search"><i class="fa-solid fa-magnifying-glass" style="color: #e29961;"></i></i></button></div>
                        <div class="scroll-area">
                            <?php
                            require_once 'connection.php';
                            $marq = "SELECT * FROM marque";
                            $all_marq = $bdd->query($marq);
                            while ($row = mysqli_fetch_assoc($all_marq)) {
                                $checked = [];
                                if (isset($_GET['brands'])) {
                                    $checked = $_GET['brands'];
                                }
                            ?>
                                <div class="content">
                                    <input type="checkbox" class="checkbox-custom" name="brands[]" value="<?php echo $row["NOMMARQ"]; ?>" <?php if (in_array($row["NOMMARQ"], $checked)) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>><?php echo $row["NOMMARQ"]; ?><br>
                                </div>
                            <?php } ?>
                        </div>

                        <hr>

                        <div class="filter-title">TYPE <button type="submit" class="search"><i class="fa-solid fa-magnifying-glass" style="color: #e29961;"></i></i></button></div>
                        <input type="checkbox" class="checkbox-custom" name="type[]" value="Déodorant" <?php if (isset($_GET['type']) && in_array('Déodorant', $_GET['type'])) echo "checked"; ?>>Déodorant<br>
                        <input type="checkbox" class="checkbox-custom" name="type[]" value="Bain et douche" <?php if (isset($_GET['type']) && in_array('Bain et douche', $_GET['type'])) echo "checked"; ?>>Bain et douche<br>
                        <input type="checkbox" class="checkbox-custom" name="type[]" value="Main et ongles" <?php if (isset($_GET['type']) && in_array('Main et ongles', $_GET['type'])) echo "checked"; ?>>Main et ongles<br>
                        <input type="checkbox" class="checkbox-custom" name="type[]" value="Soin homme" <?php if (isset($_GET['type']) && in_array('Soin homme', $_GET['type'])) echo "checked"; ?>>Soin homme<br>
                    </form>
                </div>
            </div>
            <div class="col-10">
                <h1>PRODUITS CORPS & BAIN</h1>
                <div class="filtermobile">
                    <button id="openFilterModal"><i class="fa-solid fa-plus" style="color: #e6a970;"></i> Ajouter des filtres</button>
                    <div id="filterModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <form action="" method="get">
                                <div class="filter-title">MARQUES <button type="submit" class="search"><i class="fa-solid fa-magnifying-glass" style="color: #e29961;"></i></i></button></div>
                                <div class="scroll-area">
                                    <?php
                                    require_once 'connection.php';
                                    $marq = "SELECT * FROM marque";
                                    $all_marq = $bdd->query($marq);
                                    while ($row = mysqli_fetch_assoc($all_marq)) {
                                        $checked = [];
                                        if (isset($_GET['brands'])) {
                                            $checked = $_GET['brands'];
                                        }
                                    ?>
                                        <div class="content">
                                            <input type="checkbox" class="checkbox-custom" name="brands[]" value="<?php echo $row["NOMMARQ"]; ?>" <?php if (in_array($row["NOMMARQ"], $checked)) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>><?php echo $row["NOMMARQ"]; ?><br>
                                        </div>
                                    <?php } ?>
                                </div>

                                <hr>

                                <div class="filter-title">TYPE <button type="submit" class="search"><i class="fa-solid fa-magnifying-glass" style="color: #e29961;"></i></i></button></div>
                                <input type="checkbox" class="checkbox-custom" name="type[]" value="Déodorant" <?php if (isset($_GET['type']) && in_array('Déodorant', $_GET['type'])) echo "checked"; ?>>Déodorant<br>
                                <input type="checkbox" class="checkbox-custom" name="type[]" value="Bain et douche" <?php if (isset($_GET['type']) && in_array('Bain et douche', $_GET['type'])) echo "checked"; ?>>Bain et douche<br>
                                <input type="checkbox" class="checkbox-custom" name="type[]" value="Main et ongles" <?php if (isset($_GET['type']) && in_array('Main et ongles', $_GET['type'])) echo "checked"; ?>>Main et ongles<br>
                                <input type="checkbox" class="checkbox-custom" name="type[]" value="Soin homme" <?php if (isset($_GET['type']) && in_array('Soin homme', $_GET['type'])) echo "checked"; ?>>Soin homme<br>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="product-container">
                    <?php
                    if (isset($_GET['brands']) || isset($_GET['type'])) {
                        $conditions = [];
                        if (isset($_GET['brands'])) {
                            $brandchecked = $_GET['brands'];
                            if (!empty($brandchecked)) {
                                $brandInClause = "'" . implode("','", $brandchecked) . "'";
                                $conditions[] = "NOMMARQ IN ($brandInClause)";
                            }
                        }
                        if (isset($_GET['type'])) {
                            $typechecked = $_GET['type'];
                            if (!empty($typechecked)) {
                                $typeInClause = "'" . implode("','", $typechecked) . "'";
                                $conditions[] = "TYPEPROD IN ($typeInClause)";
                            }
                        }

                        $whereClause = implode(' AND ', $conditions);
                        $prod = "SELECT * FROM produit WHERE IDCAT=3";
                        if (!empty($whereClause)) {
                            $prod .= " AND $whereClause";
                        }
                        $all_product = $bdd->query($prod);
                        if ($all_product->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($all_product)) {
                    ?>
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
                            <?php
                            }
                        } else {
                            ?>
                            <div id="no-product-found">Aucun produit trouvé!</div>
                        <?php
                        }
                    } else {
                        $prod = "SELECT * FROM produit WHERE IDCAT=3";
                        $all_product = $bdd->query($prod);
                        while ($row = mysqli_fetch_assoc($all_product)) {
                        ?>

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
                                    </a>

                                    <button class="discover" data-product-id="<?php echo $row["IDPROD"]; ?>">AJOUTER AU PANIER</button>
                                </form>

                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <footer><?php include("../pages/footer.php") ?></footer>
    <script src="../js/jsproduit.js"></script>

</body>

</html>