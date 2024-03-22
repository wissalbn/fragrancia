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
document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll(".discover");
    addToCartButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            // Prevent default form submission
            event.preventDefault();
            const form = button.closest("form");
            if (form) {
                form.submit();
            } else {
                alert("Form not found!");
            }
        });
    });
});

