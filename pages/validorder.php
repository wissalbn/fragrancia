<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valider la commande</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../styles/stylevalider.css">
</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
        <div class="backlink">
            <a href="../pages/index.php">ACCUEIL </a>
            &gt;
            <a href="../pages/cart.php"> PANIER</a>
            &gt;
            <a href="#"> VALIDER COMMANDE</a>
        </div>
    </div>
    <div class="container">



        <div class="order-summary">
            <?php
            require_once('connection.php'); // Include your database connection file

            // Fetch order details from the "panier" table
            $query = "SELECT produit.*, panier.QUANTITE FROM panier 
                  INNER JOIN produit ON panier.IDPROD = produit.IDPROD";
            $result = mysqli_query($bdd, $query);

            if (mysqli_num_rows($result) > 0) {
                $totalPrice = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemName = $row['NOMPROD'];
                    $itemImage = $row['URLIMAGE'];
                    $itemPrice = $row['PRIXPROD'];
                    $quantity = $row['QUANTITE'];

                    $subtotal = $itemPrice * $quantity;
                    $totalPrice += $subtotal;
            ?>
                    <div class="order-item">
                        <img src="<?php echo $itemImage; ?>" alt="<?php echo $itemName; ?>" class="item-image">
                        <div class="quantity-bubble"><?php echo $quantity; ?></div>
                        <div class="item-details">
                            <div class="name"><?php echo $itemName; ?></div>
                            <div class="price"><?php echo $itemPrice; ?>&euro;</div>
                        </div>
                        <div>
                            <div class="subtotal">Sous-total: <?php echo $subtotal; ?>&euro;</div>
                        </div>
                    </div>
            <?php
                }
            }

            $taxRate = 0.15; // 15% tax rate
            $taxAmount = $totalPrice * $taxRate;
            $totalPrice += $taxAmount;

            $shippingPrice = ($totalPrice > 50) ? 0 : 20;
            $totalPrice += $shippingPrice;
            ?>
            <div class="payement">
                <div class="shipping">Livraison: <?php echo $shippingPrice; ?>&euro;</div>
                <div class="tax">Taxe (<?php echo ($taxRate * 100); ?>%): <?php echo $taxAmount; ?>&euro;</div>
                <div class="order-total">
                    Total à payer TTC: <?php echo $totalPrice; ?>&euro;
                </div>
                <form id="order-form" action="../php/processorder.php" method="POST">
                    <button type="submit" class="btn btn-primary submit-button">Valider la commande</button>
                </form>
            </div>

        </div>


    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#order-form').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    dataType: 'json', // Corrected dataType
                    success: function(response) {
                        if (response.success) {
                            $('.cart-items').empty();
                            window.location.href = '../pages/successorder.php';
                        } else {
                            alert('Failed to process order: ' + response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Failed to process order. Please try again later.');
                    }
                });

            });
        });
    </script>




</body>

</html>