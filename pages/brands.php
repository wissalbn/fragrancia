<?php require_once("../pages/connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/stylebrands.css">

</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
        <hr>
        <div class="backlink">
            <a href="../pages/index.php">ACCUEIL </a>
            &gt;
            <a href="#"> MARQUES</a>
        </div>
    </div>
    <div class="main">
        <div class="row">
            <div class="container-fluid title">LES MARQUES DE A À Z</div>
        </div>
        <div class="alpha row row-cols-auto justify-content-center">
            <?php
            for ($i = 65; $i <= 90; $i++) {
                $letter = chr($i);
            ?>
                <div class="abc col-auto">
                    <a href="#<?php echo $letter; ?>"><?php echo $letter; ?></a>
                </div>
            <?php } ?>
        </div>


        <div class="row">
            <?php
            for ($i = 65; $i <= 90; $i++) {
                $alphabet = chr($i);
                $query = "SELECT * FROM marque WHERE NOMMARQ LIKE '$alphabet%'";
                $result = mysqli_query($bdd, $query);
            ?>
                <div id="<?php echo $alphabet; ?>" class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="abctitle"><?php echo $alphabet; ?></div>
                    <div class="abcbrands">
                        <ul>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $brand_url = str_replace('_', ' ', $row['NOMMARQ']);
                                    echo "<li><a href='../pages/brandproduct.php?brand=" . urlencode($brand_url) . "'>" . $row['NOMMARQ'] . "</a></li>";
                                }
                            } else {
                                echo "<li>Aucun produit dans cette catégorie!</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

            <?php } ?>
        </div>


    </div>
    <footer><?php include('../pages/footer.php'); ?></footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const alphabetLinks = document.querySelectorAll('.alpha .abc a');

        alphabetLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
</script>

</body>

</html>