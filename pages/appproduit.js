// Sélectionnez le bouton d'ajout de produit
const modalBtn = document.querySelector('.modal-btn');
// Sélectionnez le conteneur du modal
const modalContainer = document.querySelector('.modal-container');
// Sélectionnez le bouton de fermeture du modal
const closeModalBtn = document.querySelector('.close-modal');

// Fonction pour ouvrir le modal
function openModal() {
    modalContainer.classList.add('active');
}

// Fonction pour fermer le modal
function closeModal() {
    modalContainer.classList.remove('active');
}

// Écoutez les événements click sur le bouton d'ajout de produit et le bouton de fermeture du modal
modalBtn.addEventListener('click', openModal);
closeModalBtn.addEventListener('click', closeModal);
