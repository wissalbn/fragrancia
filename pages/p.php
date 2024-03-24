
<?php

include("connection.php");
// Requête SQL pour récupérer les produits
$sql_produit = "SELECT * FROM produit";
$resultat_produit = mysqli_query($bdd, $sql_produit);

if ($resultat_produit && mysqli_num_rows($resultat_produit) > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Produit</th><th>ID Catégorie</th><th>Nom Marque</th><th>Nom Produit</th><th>Prix</th><th>Type</th><th>Image</th><th>Description</th><th>Stock</th><th>Actions</th></tr></thead>";
    echo "<tbody>";
    while ($row_produit = mysqli_fetch_assoc($resultat_produit)) {
        echo "<tr><td>" . $row_produit["IDPROD"] . "</td><td>" . $row_produit["IDCAT"] . "</td><td>" .
            $row_produit["NOMMARQ"] . "</td><td>" . $row_produit["NOMPROD"] . "</td><td>" .
            $row_produit["PRIXPROD"] . "</td><td>" . $row_produit["TYPEPROD"] . "</td><td><img src='" .
            $row_produit["URLIMAGE"] . "' alt='Image produit' style='max-width: 100px;'></td><td>";
        $description = $row_produit["DESCPROD"];
        // Limiter la description à 100 caractères
        $description_courte = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
        echo $description_courte;
        // Ajouter le bouton "Voir plus"
        if (strlen($description) > 100) {
            echo "<span id='voir-plus-" . $row_produit["IDPROD"] . "' style='display: none;'>" . substr($description, 100) . "</span>";
            echo "<button onclick=\"document.getElementById('voir-plus-" . $row_produit["IDPROD"] . "').style.display='inline'; this.style.display='none';\">Voir plus</button>";
        }
        echo "</td><td>" . $row_produit["STOCK"] . "</td>";
        // Ajouter des liens pour éditer et supprimer le produit
        echo "<td><a href='edit_produit.php?id=" . $row_produit["IDPROD"] . "' class='btn btn-primary bn'>Éditer</a> ";
        echo "<a href='delete_produit.php?id=" . $row_produit["IDPROD"] . "' class='btn btn-danger bn'>Supprimer</a></td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Aucun produit trouvé.";
}?>