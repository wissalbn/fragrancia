const toggleBtn = document.querySelector('.toggle-btn');
const toggleBtnIcon = document.querySelector('.toggle-btn i');
const dropdownmenu = document.querySelector('.dropdown-menu');
const logo = document.querySelector('.logo');

toggleBtn.onclick = function () {
    dropdownmenu.classList.toggle('open');
    const isOpen = dropdownmenu.classList.contains('open');
    logo.classList.toggle('hidden', isOpen);
};

const closeBtn = document.querySelector('.close-btn');
closeBtn.addEventListener('click', function () {
    dropdownmenu.classList.remove('open');
    toggleBtnIcon.classList = 'fa-solid fa-bars';
    logo.classList.remove('hidden');
});

function updateCartNotification(count) {
    const cartNotification = document.querySelector('.cart-notification');
    if (count > 0) {
        cartNotification.textContent = count; 
        cartNotification.style.display = 'block'; 
    } else {
        cartNotification.style.display = 'none';
    }
}


function fetchCartItemCount() {

    fetch('../php/fetchcart.php')
        .then(response => response.json())
        .then(data => {

            updateCartNotification(data.count);
        })
        .catch(error => {
            console.error('Error fetching cart item count:', error);
        });
}


fetchCartItemCount();
