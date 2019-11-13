<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="css/contactForm.css">

</head>

<body>
    @include('partials/header')
    <main>
        @include("partials/navbar")
        <div class="conteneur">
            <div class="contenu">

                <body>
                    <section>
                        <h1 class="formTitle">Vous avez des questions ou des idées ? Contactez nous !</h1>
                        <div>
                            <form method="post" onsubmit="return verifForm(this)">
                                @csrf
                                <!-- Champ Email -->
                                <label for="email">Email :</label>
                                <input type="text" id="email" name="email" placeholder="Entrez votre adresse E-mail" required="required" <?php if (isset($_POST['email'])) {
                                                                                                                                                echo "value='" . $_POST['email'] . "'";
                                                                                                                                            }; ?>>
                                <!-- Champ Objet -->
                                <label for="subject">Objet (5 - 50 caractères) :</label>
                                <input type="text" id="subject" name="subject" placeholder=" Entrez l'objet de votre message" required="required" <?php if (isset($_POST['subject'])) {
                                                                                                                                                        echo "value='" . $_POST['subject'] . "'";
                                                                                                                                                    }; ?>>
                                <!-- Champ Texte -->
                                <label for="message">Message (min 50 caractères) :</label>
                                <textarea id="message" name="message" placeholder=" Ecrivez votre message..." required="required"><?php if (isset($_POST['message'])) {
                                                                                                                                        echo $_POST['message'];
                                                                                                                                    }; ?></textarea>
                                <?php if (isset($error) && isset($color)) {

                                    echo "<p class='errorMessage' style='color:$color'>" . $error . "</p>";
                                };
                                ?>
                                <!-- Bouton envoyer -->
                                <input class="submit_button" type="submit" value="Envoyer">
                            </form>
                        </div>
                    </section>
                    @include("partials/footer")
            </div>
        </div>
        </div>
    </main>
</body>

</html>