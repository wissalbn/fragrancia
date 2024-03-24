<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande validée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .title {
            color: #2B2B2B;
            font-family: "Playfair Display", serif;
            font-size: 2.5rem;
            font-style: normal;
            font-weight: 700;
            line-height: 120.833%;
            /* 3.02081rem */
            letter-spacing: 0.125rem;
            margin-bottom: 4rem;
        }

        .subtitle {
            color: #2B2B2B;
            margin: 1rem 0;
            font-family: "Halant", serif;
            font-size: 1.2rem;
            font-style: normal;
            font-weight: 600;
            line-height: 120.833%;
            /* 1.20831rem */
            letter-spacing: 0.04rem;
        }

        .link {
            display: block;
            color: #E0B594;
            font-family: 'Raleway', sans-serif;
            font-size: 1rem;
            font-style: normal;
            font-weight: 500;
            line-height: 120.833%;
            /* 1.20831rem */
            letter-spacing: 0.04rem;
            text-decoration-line: underline;
            transition: color 0.3s ease-in-out;
        }

        .link:hover{
            font-weight: 700;
        }

        @media(max-width: 768px){
            .title{
                font-size: 2rem;
            }
        }

    </style>
</head>

<body>
    <div class="header">
        <?php include("../pages/header.php"); ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="title">VOTRE COMMANDE EST BIEN PASSÉE !</div>
                    <div class="subtitle">Elle sera traitée dans les plus brefs délais.</div>
                    <a href="../pages/index.php" class="link">Retourner vers l'ACCUEIL</a>
                </div>
            </div>
        </div>
    </div>
    <footer><?php include("../pages/footer.php"); ?></footer>
</body>

</html>