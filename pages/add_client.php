<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Définir des variables pour les valeurs par défaut du formulaire
$id_client = $nom = $civilite = $email = $telephone = $pays = $ville = $adresse = "";

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $civilite = $_POST["civilite"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
    $adresse = $_POST["adresse"];

    // Requête SQL pour insérer le nouveau client dans la base de données
    $sql_insert_client = "INSERT INTO utilisateur (NOMCLIENT, CIVILITECLIENT, EMAILCLIENT, TELCLIENT, PAYS, VILLECLIENT, ADRESSECLIENT) VALUES ('$nom', '$civilite', '$email', '$telephone', '$pays', '$ville', '$adresse')";

    // Exécuter la requête SQL
    if (mysqli_query($bdd, $sql_insert_client)) {
        // Rediriger vers une page de succès ou afficher un message de succès
        header("Location: adminPanel.php#client");
        exit;
    } else {
        echo "Erreur lors de l'ajout du client: " . mysqli_error($bdd);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter un client</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="civilite">Civilité:</label>
                <select class="form-control" id="civilite" name="civilite" required>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone:</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="pays">Pays:</label>
                <input type="text" class="form-control" id="pays" name="pays"  value="MAROC" readOnly required>
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
