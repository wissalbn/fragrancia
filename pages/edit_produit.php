<?php
include("connection.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produit = $_GET['id'];
    $sql_select_produit = "SELECT * FROM produit WHERE IDPROD = $id_produit";
    $resultat_select_produit = mysqli_query($bdd, $sql_select_produit);
    
    if ($resultat_select_produit && mysqli_num_rows($resultat_select_produit) > 0) {
        $row_produit = mysqli_fetch_assoc($resultat_select_produit);
        $sql_select_categories = "SELECT * FROM categories";
        $resultat_select_categories = mysqli_query($bdd, $sql_select_categories);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Éditer Produit</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <h1>Éditer Produit</h1>
                <form action="update_produit.php" method="post">
                    <input type="hidden" name="id_produit" value="<?php echo $row_produit['IDPROD']; ?>">
                    <div class="form-group">
                        <label for="nom_categorie">Catégorie:</label>
                        <select class="form-control" id="nom_categorie" name="nom_categorie">
                            <?php
                            while ($row_categorie = mysqli_fetch_assoc($resultat_select_categories)) {
                                $selected = ($row_produit['IDCAT'] == $row_categorie['IDCAT']) ? 'selected' : '';
                                echo '<option value="' . $row_categorie['IDCAT'] . '" ' . $selected . '>' . $row_categorie['NOMCAT'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom_marque">Nom Marque:</label>
                        <input type="text" class="form-control" id="nom_marque" name="nom_marque" value="<?php echo $row_produit['NOMMARQ']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nom_produit">Nom Produit:</label>
                        <input type="text" class="form-control" id="nom_produit" name="nom_produit" value="<?php echo $row_produit['NOMPROD']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix:</label>
                        <input type="text" class="form-control" id="prix" name="prix" value="<?php echo $row_produit['PRIXPROD']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $row_produit['TYPEPROD']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="text" class="form-control" id="image" name="image" value="<?php echo $row_produit['URLIMAGE']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $row_produit['DESCPROD']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $row_produit['STOCK']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="indexAdmin.php" class="retour"  style="color: red;  margin-left: 5px;">Retour</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun produit trouvé avec l'ID spécifié.";
    }
} else {
    echo "ID de produit non spécifié.";
}
?>
