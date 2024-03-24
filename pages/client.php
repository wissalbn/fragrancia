


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles/styleClient.css">
</head>
<body>
<div class="main-content">
<div class="sidebar">
            <?php include("adminPanel.php"); ?>
</div>
<div class="main-content">
    <button id="modal-btn" class="btn btn-primary">Ajouter un client</button>

   <?php include("C.php");
    ?>
</div>
</div>
       <!-- Bouton pour ouvrir la fenêtre modale -->

    <!-- Fenêtre modale d'ajout de client -->
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1>Ajouter un client</h1>
            <form id="add-client-form" action="add_client.php" method="post">
                <!-- Vos champs de formulaire pour ajouter un client -->
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
    </div>

    <script >
        // Sélectionnez le bouton d'ajout de client
const modalBtn = document.getElementById('modal-btn');
// Sélectionnez le conteneur de la fenêtre modale
const modalContainer = document.querySelector('.modal-container');
// Sélectionnez le bouton de fermeture de la fenêtre modale
const closeModalBtn = document.querySelector('.close-modal');

// Fonction pour ouvrir la fenêtre modale
function openModal() {
    modalContainer.style.display = 'flex';
}

// Fonction pour fermer la fenêtre modale
function closeModal() {
    modalContainer.style.display = 'none';
}

// Écoutez les événements clic sur le bouton d'ajout de client et le bouton de fermeture de la fenêtre modale
modalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);

    </script>
</body>
</html>
