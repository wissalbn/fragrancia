<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="stylesheet" href="../styles/stylepanel.css">


</head>
<body>
<div class="container">
    <div class="sidebar">
    <h2 style="text-align: center;">Menu</h2>

        <ul>
            <li><a href="#produit">Produits</a></li>
            <li><a href="#commande">Commandes</a></li>
            <li><a href="#client">Clients</a></li>
            <li><a href="index.php">Accueil</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="produit" class="panel">
        <?php include("produit.php");?>
        </div>
        <div id="commande" class="panel">
        <?php include("commande.php");?>
        </div>
        <div id="client" class="panel">
        <?php include("client.php");?>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
