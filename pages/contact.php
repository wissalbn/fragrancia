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

   
    <div class="row"> <?php include("../pages/header.php"); ?>

        <div class="col-1">
            <section class="contact-info">
                <h4>COORDONNEES</h4>
                <div class="info">
                    <p><img src="../images/icones/cercle-enveloppe.png" alt="email" class="a"><strong><a href="mailto:wissal.benali22@ump.ac.ma">wissal.benali22@ump.ac.ma</a></strong></p>
                    <p><img src="../images/icones/cercle-enveloppe.png" alt="email" class="a"><strong><a href="mailto:rajae.boufoul22@ump.ac.ma">rajae.boufoul22@ump.ac.ma</a></strong></p>
                    <p><img src="../images/icones/localisation.png" alt="email" class="a"><strong><a href="http://www.esto.ump.ma">Ecole supérieur de technologie<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oujda, UMPO</a></strong></p>
                </div>
            </section>
        </div>
        <div class="col-6">
            <section class="contact-form" >
                <h4 class="nous-contact">NOUS CONTACTER</h4>
                <form action="rajae.boufoul22@ump.ac.ma" method="post" class="form">
                    <section class="form-row">
                        <div>
                            <input type="text" id="name" name="name" placeholder="nom" required>
                        </div>
                        <div>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]+" title="Veuillez entrer uniquement des chiffres" placeholder="NUMERO DE TELEPHONE" required>
                        </div>
                    </section>
                    <section>
                        <div>
                            <input type="email" id="email" name="email" placeholder="EMAIL" required>
                        </div>
                    </section>
                    <section>
                        <div>
                            <textarea id="message" name="message" rows="4" placeholder="MESSAGE" required></textarea>
                        </div>
                    </section>
                    <section>
                        <div>
                            <button type="submit">Envoyer</button>
                        </div>
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
