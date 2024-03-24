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
     <button id="modal-btn" class="btn btn-primary add-btn">Ajouter un commande</button>

   <?php include("cmd.php");
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
            <form action="add_commande.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="id_client" name="id_client" placeholder="ID Client">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="total" name="total" placeholder="Total">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="date_commande" name="date_commande" placeholder="Date de commande">
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
// Sélectionnez le bouton d'ajout de commande
const addCommandeBtn = document.getElementById('modal-btn');

// Écoutez les clics sur le bouton d'ajout de commande pour ouvrir la fenêtre modale
addCommandeBtn.addEventListener('click', openModal);
 

    </script>
</body>
</html>
