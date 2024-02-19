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
            Livraison gratuite à partir de 500DH
        </div>
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="../images/fragrancia.png" alt="Fragrancia"></a>
            </div>
            <ul class="links">
                <li><a href="#">ACCEUIL</a></li>
                <li><a href="#">PARFUM FEMME</a></li>
                <li><a href="#">PARFUM HOMME</a></li>
                <li><a href="#">COPRS &amp; BAIN</a></li>
                <li><a href="#">MARQUES</a></li>
            </ul>
            <div class="icon">
                <a href="#" class="action-btn"><img class="icons" src="../images/icones/utilisateur (1).png" alt="LOGIN"></a>
                <a href="#" class="action-btn"><img class="icons" src="../images/icones/panier (1).png" alt="panier"></a>
            </div>
            
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown-menu">
                <li><a href="#">ACCEUIL</a></li>
                <li><a href="#">PARFUM FEMME</a></li>
                <li><a href="#">PARFUM HOMME</a></li>
                <li><a href="#">COPRS &amp; BAIN</a></li>
                <li><a href="#">MARQUES</a></li>
            </div>
        </div>

    </header>
    <script>
        const toggleBtn = document.querySelector('.toggle-btn')
        const toggleBtnIcon = document.querySelector('.toggle-btn i')
        const dropdownmenu = document.querySelector('.dropdown-menu')
        toggleBtn.onclick = function(){
            dropdownmenu.classList.toggle('open')
            const isOpen = dropdownmenu.classList.contains('open')

            toggleBtnIcon.classList=isOpen
                ? 'fa-solid fa-xmark'
                : 'fa-solid fa-bars'

        }
    </script>
</body>
</html>