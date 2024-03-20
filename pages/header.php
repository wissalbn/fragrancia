<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="../styles/styleheader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="lv">
            Livraison gratuite à partir de 50&euro;
        </div>
        <div class="navbar">
            <div class="logo">
                <a href="../pages/index.php"><img src="../images/fragrancia.png" alt="Fragrancia" title="Accueil"></a>
            </div>
            <ul class="links">
                <li><a href="../pages/index.php">ACCUEIL</a></li>
                <li><a href="../pages/parfumfemme.php">PARFUM FEMME</a></li>
                <li><a href="../pages/parfumhomme.php">PARFUM HOMME</a></li>
                <li><a href="../pages/corpsbain.php">COPRS &amp; BAIN</a></li>
                <li class="menudown">
                    <a href="../pages/brands.php">MARQUES</a>
                    <div class="menudown-content">
                        <a href="#">Brand 1</a>
                        <a href="#">Brand 2</a>
                        <a href="#">Brand 3</a>
                    </div>
                </li></ul>
            <div class="icon">
                <a href="../pages/signup.php" class="action-btn"><img class="icons" src="../images/icones/utilisateur (1).png" alt="LOGIN" title="Mon compte"></a>
                <a href="../pages/cart.php" class="action-btn"><img class="icons" src="../images/icones/panier (1).png" alt="panier" title="Panier"></a>
            </div>

            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown-menu">
                <div class="close-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <li><a href="../pages/index.php">ACCEUIL</a></li>
                <li><a href="../pages/parfumfemme.php">PARFUM FEMME</a></li>
                <li><a href="../pages/parfumhomme.php">PARFUM HOMME</a></li>
                <li><a href="../pages/corpsbain.php">COPRS &amp; BAIN</a></li>
                <li><a href="../pages/brands.php">MARQUES</a></li>
                <li></li>
                <li><a href="../pages/signup.php" class="action-btn">S'IDENTIFIER</a></li>
                <li><a href="../pages/cart.php" class="action-btn">PANIER</a></li>


            </div>
        </div>

    </header>
    <script>
        const toggleBtn = document.querySelector('.toggle-btn');
        const toggleBtnIcon = document.querySelector('.toggle-btn i');
        const dropdownmenu = document.querySelector('.dropdown-menu');
        const logo = document.querySelector('.logo');

        toggleBtn.onclick = function() {
            dropdownmenu.classList.toggle('open');
            const isOpen = dropdownmenu.classList.contains('open');
            logo.classList.toggle('hidden', isOpen);
        };

        const closeBtn = document.querySelector('.close-btn');
        closeBtn.addEventListener('click', function() {
            dropdownmenu.classList.remove('open');
            toggleBtnIcon.classList = 'fa-solid fa-bars';
            logo.classList.remove('hidden');
        });
    </script>
</body>

</html>