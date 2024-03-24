
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<style>
    table{
        width:100%;
        background-color:white;
    }
    .table tbody tr td {
    padding: 10px; /* Ajoute un padding de 10px à toutes les cellules */
}
.bn:hover{
    background-color:#3b3a39;
}

    ul li a {
    color: white; /* Couleur par défaut du texte */
    transition: color 0.3s; /* Animation de transition de couleur */
    text-decoration:none;
    
}
li{
    color:white;
    padding:6px;
}

ul li a:hover,
ul li a:active {
    color: black; /* Couleur lorsque le lien est survolé ou activé */
}
h2{
    text-align:center;
    color:white;
}
    </style>



</head>
<body>
<div class="container">
    <div class="sidebar">
    <h2 >Menu</h2>

        <ul>
            <li><a href="produit.php">Produits</a></li>
            <li><a href="commande.php">Commandes</a></li>
            <li><a href="client.php">Clients</a></li>
            <li><a href="index.php">Accueil</a></li>
        </ul>
    </div>
    <div class="content">
      
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
