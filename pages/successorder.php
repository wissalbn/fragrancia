<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande validée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .header {
            background-color: #f8f9fa;
            text-align: center;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .link {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <div class="title">VOTRE COMMANDE EST BIEN PASSÉE !</div>
                    <div class="subtitle">Elle sera traitée dans les plus brefs délais.</div>
                    <a href="../pages/index.php" class="link">Retourner vers l'ACCUEIL</a>
                </div>
            </div>
        </div>
    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
    <script>
        // Redirect to successorder.php after 5 seconds
        setTimeout(function(){
            window.location.href = 'successorder.php';
        }, 5000); // Adjust the time as needed
    </script>
</body>
</html>
