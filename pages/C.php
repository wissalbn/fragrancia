
<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Requête SQL pour récupérer les clients
$sql_client = "SELECT * FROM utilisateur";
$resultat_client = mysqli_query($bdd, $sql_client);

if ($resultat_client && mysqli_num_rows($resultat_client) > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID Client</th><th>Nom</th><th>Civilité</th><th>Email</th><th>Téléphone</th><th>Pays</th><th>Ville</th><th>Adresse</th></tr></thead>";
    echo "<tbody>";
    while ($row_client = mysqli_fetch_assoc($resultat_client)) {
        echo "<tr><td>" . $row_client["IDCLIENT"] . "</td><td>" . $row_client["NOMCLIENT"] . "</td><td>" . $row_client["CIVILITECLIENT"] . "</td><td>" . $row_client["EMAILCLIENT"] . "</td><td>" . $row_client["TELCLIENT"] . "</td><td>" . $row_client["PAYS"] . "</td><td>" . $row_client["VILLECLIENT"] . "</td><td>" . $row_client["ADRESSECLIENT"] . "</td>";
        echo "<td><a href='delete_client.php?id=" . $row_client["IDCLIENT"] . "' class='btn btn-danger bn'>Supprimer</a></td></tr>";
      
    }
    
} else {
    echo "Aucun client trouvé.";
}
?>