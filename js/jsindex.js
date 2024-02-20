document.addEventListener("DOMContentLoaded", function() {
    const scrollContainer = document.querySelector(".product-container");
    const leftButton = document.querySelector(".scroll-button.left");
    const rightButton = document.querySelector(".scroll-button.right");

    leftButton.addEventListener("click", function() {
        scrollContainer.scrollBy({
            left: -300,
            behavior: "smooth"
        });
    });

    rightButton.addEventListener("click", function() {
        scrollContainer.scrollBy({
            left: 300,
            behavior: "smooth"
        });
    });
});
