<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .sidebar {
        background-color: #333;
        color: white;
        height: 100vh; /* 100% de la hauteur de la vue */
    }

    .content {
        padding: 20px;
    }
</style>
</head>
<body>
<div class="container-fluid">
<?php include("../pages/header.php"); ?>
    <div class="row">
        <div class="col-md-3 sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#produit">Produits</a></li>
                <li><a href="#commande">Commandes</a></li>
                <li><a href="#client">Clients</a></li>
            </ul>
        </div>
        <div class="col-md-9 content">
            <h2>Contenu</h2>
            <div id="produit" style="display:none;">
                Contenu de la section Produit
            </div>
            <div id="commande" style="display:none;">
                Contenu de la section Commande
            </div>
            <div id="client" style="display:none;">
                Contenu de la section Client
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('ul li a').click(function(){
        var target = $(this).attr('href');
        $('.content div').hide();
        $(target).show();
        return false;
    });
</script>
</body>
</html>
