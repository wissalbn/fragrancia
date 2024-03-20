document.querySelectorAll(".plus").forEach(plus => {
    plus.addEventListener("click", () => {
        const num = plus.parentNode.querySelector(".num");
        let quantity = parseInt(num.innerText);
        quantity++;
        num.innerText = quantity < 10 ? "0" + quantity : quantity;
        // Send AJAX request to update quantity
        updateQuantity(plus);
    });
});

document.querySelectorAll(".minus").forEach(minus => {
    minus.addEventListener("click", () => {
        const num = minus.parentNode.querySelector(".num");
        let quantity = parseInt(num.innerText);
        if (quantity > 1) {
            quantity--;
            num.innerText = quantity < 10 ? "0" + quantity : quantity;
            updateQuantity(minus); // Pass the clicked minus button
        }
    });
});

function updateQuantity(button) {
    const productId = button.closest('.cart-item').dataset.productId;
    const quantity = parseInt(button.parentNode.querySelector(".num").innerText); // Get the quantity from the num element
    $.post('../pages/cartform.php', {
        productId: productId,
        quantity: quantity
    }, function(response) {
        if (response === 'success') {
            // Update the UI immediately
            updateTotals();
        } else {
            alert('Failed to update quantity');
        }
    });
}

// $(document).ready(function() {
//     // Function to update cart items dynamically
//     function updateCartItems() {
//         $.ajax({
//             url: '../pages/get_cart_items.php', // PHP script to fetch updated cart items
//             type: 'GET',
//             success: function(response) {
//                 $('#cart-items').html(response); // Update cart items HTML
//             },
//             error: function(xhr, status, error) {
//                 console.error(xhr.responseText);
//             }
//         });
//     }

//     // Initial call to update cart items
//     updateCartItems();

//     // Event listener for plus and minus buttons
//     $(document).on('click', '.plus, .minus', function() {
//         updateCartItems(); // Update cart items after quantity change
//     });

//     // Event listener for delete button
//     $(document).on('click', '.supress', function() {
//         updateCartItems(); // Update cart items after item deletion
//     });
// });

$(document).ready(function() {
    // Function to update totals
    function updateTotals() {
        var subtotal = 0;
        $('.subtotal').each(function() {
            subtotal += parseFloat($(this).text());
        });
        $('.totaleuro').text(subtotal);
    }

    // Event listener for clicking the delete button
    $('.supress').click(function() {
        var productId = $(this).closest('.cart-item').data('product-id');
        var $cartItem = $(this).closest('.cart-item');

        $.post('../pages/removecart.php', {
            productId: productId,
            action: 'deleteProduct'
        }, function(response) {
            if (response === 'success') {
                $cartItem.remove(); // Remove the item from the DOM
                updateTotals(); // Update totals after removing the item
            } else {
                alert('Failed to delete product');
            }
        });
    });

    // Event listener for clicking the plus/minus buttons
    $('.wrapper').on('click', '.plus, .minus', function() {
        var $quantity = $(this).siblings('.num');
        var productId = $(this).closest('.cart-item').data('product-id');
        var currentQuantity = parseInt($quantity.text());
        var newQuantity = currentQuantity + ($(this).hasClass('plus') ? 1 : -1);

        if (newQuantity >= 1) {
            // Send AJAX request to update quantity
            $.post('../pages/cartform.php', {
                productId: productId,
                quantity: newQuantity
            }, function(response) {
                if (response === 'success') {
                    $quantity.text(newQuantity); // Update quantity display
                    var price = parseFloat($quantity.closest('.cart-item').find('.price').text());
                    $quantity.closest('.cart-item').find('.subtotal').text(price * newQuantity);
                    updateTotals(); // Update totals after changing quantity
                } else {
                    alert('Failed to update quantity');
                }
            });
        }
    });
});

