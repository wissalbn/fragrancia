<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
    </div>
    <div class="main">
        <div class="row justify-content-envenly">
            <div class="col-6">
                <div class="title ">VOTRE PANIER</div>
            </div>
            <div class="col-6">
                <div class="backlink "><a href="#">Continuer les achats</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 align-self-start">PRODUIT</div>
            <div class="col-3 align-self-start">QUANTITE</div>
            <div class="col-3 align-self-start">SOUS-TOTAL</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Product Image Column -->
                <div class="row">
                    <div class="col-md-4">
                        <img src="../images/offre.webp" class="img-fluid" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <!-- Product Details Column -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Product Name -->
                                <h4>Product Name</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Product Price -->
                                <p>Product Price</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-4">
                        <div class="wrapper">
                            <span class="minus">-</span>
                            <span class="num">01</span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="supress"><i class="fa-sharp fa-regular fa-trash"></i></div>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="subtotal">55</div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-2 align-items-end">
                <div class="total">TOTAL ESTIME</div>
            </div>
            <div class="col-2 align-items-end">
                <div class="totaleuro">22 dh</div>
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
    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
</body>
<script>
    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");

    let a = 1;
    plus.addEventListener("click", () => {
        a++;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
        console.log(a);
    });
    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
            console.log(a);
        }

    });
</script>

</html>