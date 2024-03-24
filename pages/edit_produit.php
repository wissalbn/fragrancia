<?php
include("connection.php");

// Vérifier si un ID de produit est passé en paramètre
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produit = $_GET['id'];
    
    // Requête SQL pour récupérer les informations du produit à éditer
    $sql_select_produit = "SELECT * FROM produit WHERE IDPROD = $id_produit";
    $resultat_select_produit = mysqli_query($bdd, $sql_select_produit);
    
    if ($resultat_select_produit && mysqli_num_rows($resultat_select_produit) > 0) {
        $row_produit = mysqli_fetch_assoc($resultat_select_produit);
        // Afficher un formulaire pré-rempli avec les informations du produit
        ?>
        <?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si les données du formulaire sont soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis
    if (isset($_POST['id_produit'], $_POST['id_categorie'], $_POST['nom_marque'], $_POST['nom_produit'], $_POST['prix'], $_POST['type'], $_POST['image'], $_POST['description'], $_POST['stock'])) {
        // Récupérer les données du formulaire
        $id_produit = $_POST['id_produit'];
        $id_categorie = $_POST['id_categorie'];
        $nom_marque = $_POST['nom_marque'];
        $nom_produit = $_POST['nom_produit'];
        $prix = $_POST['prix'];
        $type = $_POST['type'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];

        // Requête SQL pour mettre à jour le produit
        $sql_update_produit = "UPDATE produit SET IDCAT = '$id_categorie', NOMMARQ = '$nom_marque', NOMPROD = '$nom_produit', PRIXPROD = '$prix', TYPEPROD = '$type', URLIMAGE = '$image', DESCPROD = '$description', STOCK = '$stock' WHERE IDPROD = $id_produit";

        // Exécuter la requête SQL
        if (mysqli_query($bdd, $sql_update_produit)) {
            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: adminPanel.php#produit");
            exit;
        } else {
            echo "Erreur lors de la mise à jour du produit: " . mysqli_error($bdd);
        }
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
}
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Éditer Produit</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                .btn-primary {
                      background-color: rgba(224, 181, 148, 1);;
        
                       border:none !important;
                    }
                       .btn-primary:hover {
                      background-color: #3b3a39;
            
                       }
                form{
                      width:50%;

                     }

            </style>
        </head>
        <body>
            <div class="container">
                <h1>Éditer Produit</h1>
                <form action="" method="post">
                    <input type="hidden" name="id_produit" value="<?php echo $row_produit['IDPROD']; ?>">
                    <div class="form-group">
                        <label for="id_categorie">ID Catégorie:</label>
                        <input type="text" class="form-control" id="id_categorie" name="id_categorie" value="<?php echo $row_produit['IDCAT']; ?>">
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
                    <button type="submit" class="btn btn-primary">Enregistrer</button> <a href="commande.php" class="retour"  style="color: red;  margin-left: 5px;"><-retour</a>
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
