<?php
session_start();
include("connection.php");
// Vérifier si la session admin n'est pas définie ou n'est pas true
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Rediriger l'utilisateur vers une autre page
    header('Location: index.php');
    exit; // Arrêter l'exécution du script
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panneau d'administrateur - fragrancia</title>
  <link rel="stylesheet" href="../styles/styleindexAdmin.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
  <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
    <div class="container-fluid">
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="index.php">
            <h3 class="text-success"><img src="../images/fragrancia.png" width="250"></h3> 
        </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="bi bi-house"></i> Accueil
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="#produit" id="produit-link">
                            <i class="bi bi-bookmarks"></i> produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="client-link" href="#client">
                            <i class="bi bi-people"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#commande" id="commande-link">
                            <i class="bi bi-globe-americas"></i> Commandes
                        </a>
                    </li>
                    </ul>
               
               
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <form action="logout.php" method="post">
                        <button type="submit" name="logout" class="nav-link" onclick="return confirm('Voulez-vous vous déconnecter ?')">
                        <i class="bi bi-box-arrow-left"></i> Déconnecter
                        </button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Commandes</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php
include("connection.php");
if ($bdd) {
    $sql = "SELECT count(TOTAUX) AS total FROM commande";
    $result = $bdd->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total'];
        echo " $total";
    } else {
        echo "Erreur  : " . $bdd->error;
    }
    $bdd->close();
} else {
    echo "Erreur de connexion à la base>>>>";
}
?>

                                        </span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: rgba(218, 193, 187, 1); color: white; font-size: 24px; border-radius: 50%; text-align: center; line-height: 48px; width: 48px; height: 48px;">
                                            <i class="bi bi-credit-card"></i>
                                    </div>

                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">de 26/03/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Clients</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php
include("connection.php");

if ($bdd) {
    $sql = "SELECT count(IDCLIENT) AS total FROM utilisateur";

    $result = $bdd->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total'];
        echo " $total ";
    } else {
        echo "Erreur  : " . $bdd->error;
    }
    $bdd->close();
} else {
    echo "Erreur de connexion à la base>>>>";
}
?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: black; color: white; font-size: 24px; border-radius: 50%; text-align: center; line-height: 48px; width: 48px; height: 48px;">
                                            <i class="bi bi-people"></i>
                                    </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">de 26/03/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">chiffre affaires</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php
include("connection.php");

if ($bdd) {
    $sql = "SELECT SUM(TOTAUX) AS total FROM commande";

    $result = $bdd->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total'];
        echo " $total £";
    } else {
        echo "Erreur  : " . $bdd->error;
    }
    $bdd->close();
} else {
    echo "Erreur de connexion à la base>>>>";
}
?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: rgba(224, 181, 148, 1); color: white; font-size: 24px; border-radius: 50%; text-align: center; line-height: 48px; width: 48px; height: 48px;">
                                            <i class="bi bi-cash"></i>
                                    </div>

                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>
                                    </span>
                                    <span class="text-nowrap text-xs text-muted">de 26\03\2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Produits</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php
include("connection.php");

if ($bdd) {
    $sql = "SELECT count(IDPROD) AS total FROM produit";

    $result = $bdd->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total'];
        echo " $total ";
    } else {
        echo "Erreur  : " . $bdd->error;
    }
    $bdd->close();
} else {
    echo "Erreur de connexion à la base>>>>";
}
?>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                    <div class="icon icon-shape" style="background-color: #8B0000; color: white; font-size: 24px; border-radius: 50%; text-align: center; line-height: 48px; width: 48px; height: 48px;">
                                            <i class="bi bi-minecart-loaded"></i>
                                    </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    
                                    <span class="text-nowrap text-xs text-muted">de 26/03/2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7" id="client-content" style="display:none;">
                <script>
                    document.getElementById("client-link").addEventListener("click", function() {
        document.getElementById("client-content").style.display = "block";
    });
                </script>
                <div class="card shadow border-0 mb-7"  >
                <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center justify-content-end">
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                            <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-bs-toggle="modal" data-bs-target="#clientModal">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>créer</span>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-client-form" action="add_client.php" method="post">
                <div class="form-group">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" pattern="^[a-zA-Z\s]+$" required>
            </div>
            <div class="form-group">
                <select class="form-control" id="civilite" name="civilite" placeholder="Civilité" required>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="telephone" name="telephone" pattern="^\d+(\.\d{1,2})?$" placeholder="Téléphone" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="pays" name="pays"  value="MAROC" readOnly required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" pattern="^[a-zA-Z\s]+$" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="adresse" name="adresse" rows="3" placeholder="Adresse" required></textarea>
            </div>
   
         <div class="modal-footer">     
        <button type="submit" class="btn btn-primary">Ajouter</button></div>
    </form>
            </div>
           
            
        </div>
    </div>
</div>
        

                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Civilité</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Pays</th>
                                    <th scope="col">Ville</th>

                                    <th scope="col">Adresse</th>

                                </tr>
                            </thead>
                            <tbody>
                        
                            <?php

include("connection.php");

$sql_client = "SELECT * FROM utilisateur";
$resultat_client = mysqli_query($bdd, $sql_client);

if ($resultat_client && mysqli_num_rows($resultat_client) > 0) {
    while ($row_client = mysqli_fetch_assoc($resultat_client)) {
        echo "<tr><td>" .  $row_client["NOMCLIENT"] . "</td><td>" . $row_client["CIVILITECLIENT"] . "</td><td>" . $row_client["EMAILCLIENT"] . "</td><td>" . $row_client["TELCLIENT"] . "</td><td>" . $row_client["PAYS"] . "</td><td>" . $row_client["VILLECLIENT"] . "</td><td>" . $row_client["ADRESSECLIENT"] . "</td>
        <td class='text-end'>" .
        "</td></tr>";

    }
}


else {
    echo"";
}
?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                </div>
     <!--***********************************COMMANDE******************************************************************** */ -->          
                <div class="card shadow border-0 mb-7" id="commande-content" style="display:none;">
                <script>
                    
    document.getElementById("commande-link").addEventListener("click", function() {
      document.getElementById("commande-content").style.display = "block";
  });
                </script>
                <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center justify-content-end">
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                            <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>créer</span>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un commande</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="add_commande.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="nom_client" name="nom_client" pattern="^[a-zA-Z\s]+$" title="Veuillez entrer un nom valide (lettres et espaces uniquement)" placeholder="Nom Client*" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="total" name="total"  pattern="^\d+(\.\d{1,2})?$" title="Veuillez entrer un nombre valide (ex: 123.45)" placeholder="Total*" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="date_commande" name="date_commande" placeholder="Date de commande*" required>
        </div>
         <div class="modal-footer">     
        <button type="submit" class="btn btn-primary">Ajouter</button></div>
    </form>
            </div>
           
            
        </div>
    </div>
</div>

            
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">N° de commande</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date de commande</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                            <?php

include("connection.php");

$sql_commande = "SELECT c.IDCOMMANDE, c.DATECOMMANDE, c.TOTAUX, u.NOMCLIENT
               FROM commande c
               JOIN utilisateur u ON c.IDCLIENT = u.IDCLIENT";

$resultat_commande = mysqli_query($bdd, $sql_commande);

if ($resultat_commande && mysqli_num_rows($resultat_commande) > 0) {
    while ($row_commande = mysqli_fetch_assoc($resultat_commande)) {
        echo "<tr><td>" . $row_commande["IDCOMMANDE"] . "</td><td>" . $row_commande["NOMCLIENT"] . "</td><td>" . $row_commande["TOTAUX"] . "</td><td>" . $row_commande["DATECOMMANDE"] . "</td>
        <td class='text-end'>" .
        "<a href='edit_commande.php?id=" . $row_commande["IDCOMMANDE"] . "' class='btn btn-sm btn-neutral'>Éditer</a>" .
        "</td></tr>";

    }
} else {
    echo "<tr><td colspan='3'></td></tr>";
}
?>

                            </tbody>
                        </table>
                    </div>
                </div>
<!--****************************************PRODUIT********************************************--> 
                <div class="card shadow border-0 mb-7" id="produit-content" style="display:none;">
                <script> document.getElementById("produit-link").addEventListener("click", function() {
                       document.getElementById("produit-content").style.display = "block";
                });</script>
                <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center justify-content-end">
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                            <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1" data-bs-toggle="modal" data-bs-target="#produitModal">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>créer</span>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="produitModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="add_produit.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="nom_categorie" name="nom_categorie" placeholder="Catégorie" pattern="^[a-zA-Z\s]+$"required >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="nom_marque" name="nom_marque" placeholder="Nom Marque" pattern="^[a-zA-Z\s]+$" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="nom_produit" name="nom_produit" placeholder="Nom Produit" pattern="^[a-zA-Z\s]+$" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix" pattern="^\d+(\.\d{1,2})?$" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="type" name="type" placeholder="Type" pattern="^[a-zA-Z\s]+$" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="url_image" name="url_image" placeholder="Image URL" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" pattern="^\d+(\.\d{1,2})?$" required>
        </div> 
   
         <div class="modal-footer">     
        <button type="submit" class="btn btn-primary">Ajouter</button></div>
    </form>
            </div>
           
            
        </div>
    </div>
</div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">N° Produit</th>
                                    <th scope="col">Nom Produit</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Stock</th>


                                </tr>
                            </thead>
                            <tbody>
                            <?php

include("connection.php");

$sql_produit = "SELECT p.IDPROD, p.NOMPROD, c.NOMCAT, p.NOMMARQ, p.PRIXPROD, p.TYPEPROD, p.URLIMAGE, p.DESCPROD, p.STOCK
               FROM produit p
               JOIN categories c ON p.IDCAT = c.IDCAT";
$resultat_produit = mysqli_query($bdd, $sql_produit);

if ($resultat_produit && mysqli_num_rows($resultat_produit) > 0) {
    while ($row_produit = mysqli_fetch_assoc($resultat_produit)) {
        echo "<tr><td>" . $row_produit["IDPROD"] . "</td><td>" . $row_produit["NOMPROD"] . "</td><td>" . $row_produit["NOMCAT"] . "</td><td>" . $row_produit["NOMMARQ"] . "</td><td>" . $row_produit["PRIXPROD"] . "</td><td>" . $row_produit["TYPEPROD"] . "</td><td><img src='" .
        $row_produit["URLIMAGE"] . "' alt='Image produit' style='max-width: 100px;'></td><td>";
        
        $description = $row_produit["DESCPROD"];
        $description_courte = strlen($description) > 100 ? substr($description, 0, 100) . "..." : $description;
        echo $description_courte;
        
        if (strlen($description) > 100) {
            echo "<span id='voir-plus-" . $row_produit["IDPROD"] . "' style='display: none;'>" . substr($description, 100) . "</span>";
            echo "<button onclick=\"document.getElementById('voir-plus-" . $row_produit["IDPROD"] . "').style.display='inline'; this.style.display='none'; document.getElementById('voir-moins-" . $row_produit["IDPROD"] . "').style.display='inline';\">Voir plus</button>";
            echo "<button id='voir-moins-" . $row_produit["IDPROD"] . "' style='display: none;' onclick=\"document.getElementById('voir-plus-" . $row_produit["IDPROD"] . "').style.display='none'; document.getElementById('voir-moins-" . $row_produit["IDPROD"] . "').style.display='none'; this.previousSibling.style.display='inline';\">Voir moins</button>";
        }

        echo "</td><td>" . $row_produit["STOCK"] . "</td>
        <td class='text-end'>" .
        "<a href='edit_produit.php?id=" . $row_produit["IDPROD"] . "' class='btn btn-sm btn-neutral'>Éditer</a>
        </td></tr>";
    }
}  else {
    echo "";
}
?>


                            </tbody>
                        </table>
                    </div>
                    
                </div>


            </div>

        </main>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>
</html>
