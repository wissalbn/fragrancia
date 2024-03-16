document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("filterModal");
    var btn = document.getElementById("openFilterModal");
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

// Frontend JavaScript
document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.discover');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });
});

function addToCart(event) {
    const productId = event.target.dataset.productId;
    console.log('Product ID:', productId);
    
    fetch('/add-to-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ productId })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to add product to cart');
        }
        return response.json();
    })
    .then(data => {
        console.log('Product added to cart:', data);
        alert("produit ajouté!");
        // Optionally, show a success message to the user
    })
    .catch(error => {
        console.error('Error adding product to cart:', error.message);
        alert("produit non aouté");
        // Optionally, show an error message to the user
    });
}
