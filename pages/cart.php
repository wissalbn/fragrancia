<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../styles/stylecart.css">



</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
    </div>
    <div class="main">

        <?php
        if (!isset($_SESSION['userId'])) { ?>
            <div class="contenaire1">
                <div class="row">
                    <div class="col-12">
                        <div class="title">
                            VOUS N'ETES PAS CONNECTE! VEUILLEZ SE CONNECTER
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="../pages/login.php">
                            <button type="submit">SE CONNECTER</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else {
        ?>
            <div class="contenaire2">
                <div class="row justify-content-evenly">
                    <div class="col-6">
                        <div class="title">VOTRE PANIER</div>
                    </div>
                    <div class="col-6">
                        <div class="backlink"><a href="javascript:void(0);" onclick="goBack()">Continuer les achats</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 align-self-start">PRODUIT</div>
                    <div class="col-3 align-self-start">QUANTITE</div>
                    <div class="col-3 align-self-start">SOUS-TOTAL</div>
                </div>
                <?php
                require_once("../pages/connection.php");
                $userId = $_SESSION['userId'];
                $sql = "SELECT p.IDPROD, p.NOMPROD, p.PRIXPROD, p.URLIMAGE, pa.QUANTITE FROM panier AS pa 
            JOIN produit AS p ON pa.IDPROD = p.IDPROD 
            JOIN client_cart AS cc ON pa.IDPANIER = cc.IDPANIER 
            WHERE cc.IDCLIENT = ?";
                $stmt = $bdd->prepare($sql);
                $stmt->bind_param('i', $userId);
                $stmt->execute();
                $result = $stmt->get_result();

                ?>
                <?php if ($result->num_rows > 0) { ?>
                <div id="cart-items">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="row cart-item" data-product-id="<?php echo $row['IDPROD']; ?>">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo $row["URLIMAGE"]; ?>" class="img-fluid" alt="Product Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="nomprod"><?php echo $row["NOMPROD"]; ?></div>
                                        <div class="price"><?php echo $row["PRIXPROD"]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="wrapper">
                                            <span class="minus">-</span>
                                            <span class="num"><?php echo $row["QUANTITE"]; ?></span>
                                            <span class="plus">+</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="supress"><i class="fa-solid fa-trash" style="color: #d21204;"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="subtotal"><?php echo $row["PRIXPROD"] * $row["QUANTITE"]; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="row align-items-end">
                    <div class="col-2 align-items-end">
                        <div class="total">TOTAL ESTIME</div>
                    </div>
                    <div class="col-2 align-items-end">
                        <div class="totaleuro"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="taxe">
                            Taxes, réductions et frais d’expédition calculés à l’étape du paiement
                        </div>
                        <button type="submit" class="payement">PROCEDER AU PAIEMENT</button>
                    </div>
                </div>
                <?php } else { ?>
                    <!-- Cart is empty -->
                    <div class="row justify-content-evenly">
                        <div class="col-12">
                            <div class="title">Votre panier est vide</div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
</body>

<script src="../js/jscart.js"></script>

</html>