<?php
session_start();

// Vérifier si la session admin n'est pas définie ou n'est pas true
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers une autre page
    header('Location: index.php');
    exit; // Arrêter l'exécution du script
}
?>
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
</div>
<div class="main-content">  
    <!-- Bouton pour ouvrir la fenêtre modale -->
    <button id="modal-btn" class="btn btn-primary">Ajouter un produit</button>
    <?php include("p.php"); ?>
</div>



    <!-- Fenêtre modale d'ajout de client -->
    <div class="modal-container">
        <div class="overlay modal-trigger"></div>
        <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
            <button aria-label="close modal" class="close-modal modal-trigger">X</button>
            <h1>Ajouter un client</h1>
            <form action="add_produit.php" method="post">
        <div class="form-group">
            <label for="id_categorie">ID Catégorie:</label>
            <input type="text" class="form-control" id="id_categorie" name="id_categorie">
        </div>
        <div class="form-group">
            <label for="nom_marque">Nom Marque:</label>
            <input type="text" class="form-control" id="nom_marque" name="nom_marque">
        </div>
        <div class="form-group">
            <label for="nom_produit">Nom Produit:</label>
            <input type="text" class="form-control" id="nom_produit" name="nom_produit">
        </div>
        <div class="form-group">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control" id="prix" name="prix">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>
        <div class="form-group">
            <label for="url_image">Image URL:</label>
            <input type="text" class="form-control" id="url_image" name="url_image">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" class="form-control" id="stock" name="stock">
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
