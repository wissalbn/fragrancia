<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Parfumerie</title>
    <link rel="stylesheet" href="../styles/stylecontact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <?php include("../pages/header.php"); ?>

    <div class="row">

        <div class="col-6">
            <section class="contact-info">
                <h2>Coordonnées</h2>

                <p><strong> <a href="mailto:wissal.benali22@ump.ac.ma">wissal.benali22@ump.ac.ma</a></strong></p>
                <p><strong> <a href="mailto:rajae.boufoul22@ump.ac.ma">rajae.boufoul22@ump.ac.ma</a></strong></p>
                <p><strong> <a href="www.esto.ump.ma">Ecole supérieur de technologie<br> Oujda, UMPO</a></strong></p>

            </section>
        </div>
        <div class="col-6">
            <section>
                <h2>Formulaire de Contact</h2>
                <form action="rajae.boufoul22@ump.ac.ma" method="post" class="form">
                    <section class="form-row">
                        <div>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]+" title="Veuillez entrer uniquement des chiffres" required>
                        </div>
                    </section>
                    <section>
                        <input type="email" id="email" name="email" required>
                    </section>
                    <section>
                        <textarea id="message" name="message" rows="4" required></textarea>
                    </section>
                    <section>
                        <button type="submit">Envoyer</button>
                    </section>

                </form>
            </section>
        </div>


    </div>
    <footer>
        <?php include("../pages/footer.php"); ?>
    </footer>

</body>

</html>