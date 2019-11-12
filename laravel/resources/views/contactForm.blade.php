<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contactForm.css">
    <script type=" text/javascript" src="js/index.js">
    </script>
</head>

<body>
    <main>
        <h1 class="formTitle">Vous avez des questions ou des idées ? Contactez nous !</h1>
        <div>
            <form action="contactForm" method="post" onsubmit="return verifForm(this)">
                @csrf
                <!-- Champ Email -->
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" placeholder="Entrez votre adresse E-mail" required="required" <?php if (isset($_POST['email'])) {
                                                                                                                                echo "value='" . $_POST['email'] . "'";
                                                                                                                            }; ?>>
                <!-- Champ Objet -->
                <label for="object">Objet (min 10 caractères) :</label>
                <input type="text" id="object" name="object" placeholder=" Entrez l'objet de votre message" required="required" <?php if (isset($_POST['object'])) {
                                                                                                                                    echo "value='" . $_POST['object'] . "'";
                                                                                                                                }; ?>>
                <!-- Champ Texte -->
                <label for="subject">Message (min 50 caractères) :</label>
                <textarea id="subject" name="subject" placeholder=" Ecrivez votre message..." required="required"><?php if (isset($_POST['subject'])) {
                                                                                                                        echo $_POST['subject'];
                                                                                                                    }; ?></textarea>
                <?php if (isset($_POST['error'])) {
                    echo "<p class='errorMessage'>" . "mdp incorect" . "</p>";
                };
                ?>
                <!-- Bouton envoyer -->
                <input class="submit_button" type="submit" value="Envoyer">
            </form>
        </div>
    </main>
</body>