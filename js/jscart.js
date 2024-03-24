


function refreshPage() {
    window.location.reload();
}

function goBack() {
    window.history.back();
}

$(document).ready(function () {
    var $quantity;

    function updateTotals() {
        var subtotal = 0;
        $('.subtotal').each(function () {
            subtotal += parseFloat($(this).text());
        });
        var totalEuro = subtotal.toFixed(2) + '€';
        $('.totaleuro').text(totalEuro);
    }
    updateTotals();
    $('.supress').click(function () {
        var $cartItem = $(this).closest('.cart-item');
        var productId = $cartItem.data('product-id');
        $.post('../pages/removecart.php', {
            productId: productId,
            action: 'deleteProduct'
        }, function (response) {
            if (response === 'success') {
                $cartItem.remove();
                updateTotals();
            } else {
                // alert('Failed to delete product from cart.');
            }
            refreshPage();
        });
    });

    $('.plus').on('click', function () {
        $quantity = $(this).siblings('.num');
        var productId = $(this).closest('.cart-item').data('product-id');
        var currentQuantity = parseInt($quantity.text());
        var newQuantity = currentQuantity + 1;

        updateCartQuantity(productId, newQuantity, $quantity);
    });

    $('.minus').on('click', function () {
        $quantity = $(this).siblings('.num');
        var productId = $(this).closest('.cart-item').data('product-id');
        var currentQuantity = parseInt($quantity.text());
        var newQuantity = Math.max(currentQuantity - 1, 1);

        updateCartQuantity(productId, newQuantity, $quantity);
    });

    function updateCartQuantity(productId, quantity, $quantityElement) {
        $.post('../pages/updatecart.php', {
            productId: productId,
            quantity: quantity
        }, function (response) {
            if (response === 'success') {
                $quantityElement.text(quantity);
                var price = parseFloat($quantityElement.closest('.cart-item').find('.price').text());
                $quantityElement.closest('.cart-item').find('.subtotal').text(price * quantity);
                updateTotals();
            } else {
                alert('Failed to update quantity.');
            }
        });
    }
});



