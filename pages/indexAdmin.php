<?php
// Inclure le fichier de connexion à la base de données
include("connection.php");?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Bootstrap Dashboard and Admin Template - ByteWebster</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
            <h1 class="text-success"><img src="../images/fragrancia.png" width="230"></h1> 
        </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
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
                        <a class="nav-link" href="#produit">
                            <i class="bi bi-bookmarks"></i> produits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#client">
                            <i class="bi bi-people"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#commande">
                            <i class="bi bi-globe-americas"></i> Commande
                        </a>
                    </li>
                    </ul>
               
               
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i> Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>éditer</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
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
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Commandes</span>
                                        <span class="h3 font-bold mb-0">
                                        <?php
// Inclure le fichier de connexion à la base de données
include("connection.php");

// Vérifier si la connexion est établie
if ($bdd) {
    // Requête SQL pour calculer la somme des totaux dans la table commande
    $sql = "SELECT count(TOTAUX) AS total FROM commande";

    // Exécuter la requête
    $result = $bdd->query($sql);

    // Vérifier si la requête a réussi
    if ($result) {
        // Récupérer le résultat
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
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">chiffre d'affaires</span>
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
                <div class="card shadow border-0 mb-7" id="client">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Client</th>
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
        "<a href='#' class='btn btn-sm btn-neutral'>View</a>
        <button type='button' onclick='showSweetAlert()' class='btn btn-sm btn-square btn-neutral text-danger-hover'>
        <i class='bi bi-trash'></i>
        </button>
        </td></tr>";
        
        }
   
} else {
    echo"";
}
?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
                
                <div class="card shadow border-0 mb-7" id="commande">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">N° de commande</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Date de commande</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                            <?php

include("connection.php");

$sql_commande = "SELECT c.IDCOMMANDE, c.DATECOMMANDE, u.NOMCLIENT
               FROM commande c
               JOIN utilisateur u ON c.IDCLIENT = u.IDCLIENT";

$resultat_commande = mysqli_query($bdd, $sql_commande);

if ($resultat_commande && mysqli_num_rows($resultat_commande) > 0) {
    while ($row_commande = mysqli_fetch_assoc($resultat_commande)) {
        echo "<tr><td>" . $row_commande["IDCOMMANDE"] . "</td><td>" . $row_commande["NOMCLIENT"] . "</td><td>" . $row_commande["DATECOMMANDE"] . "</td>
        <td class='text-end'>" .
        "<a href='#' class='btn btn-sm btn-neutral'>View</a>
        <button type='button' onclick='showSweetAlert()' class='btn btn-sm btn-square btn-neutral text-danger-hover'>
        <i class='bi bi-trash'></i>
        </button>
        </td></tr>";
    }
} else {
    echo "<tr><td colspan='3'></td></tr>";
}
?>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7" id="produit">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">N° Produit</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Nom Produit</th>
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
        "<a href='#' class='btn btn-sm btn-neutral'>View</a>
        <button type='button' onclick='showSweetAlert()' class='btn btn-sm btn-square btn-neutral text-danger-hover'>
        <i class='bi bi-trash'></i>
        </button>
        </td></tr>";
    }
}  else {
    echo "";
}
?>


                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>


            </div>

        </main>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>
</html>
