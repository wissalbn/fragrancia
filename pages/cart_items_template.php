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
