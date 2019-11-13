<?php
/*
if (isset($_POST['email']) && isset($_POST['object']) && isset($_POST['subject'])) {
    $color = "red";
    if (PHPverifSubject($_POST['subject'])) $message = "Champ message trop court";
    if (PHPverifObject($_POST['object'])) $message = "Champ object trop court";
    if (PHPverifEmail($_POST['email'])) $message = "Format d'email invalide";
    if (!isset($message)) {
        $sending = mail("axelbrosset@laposte.net", $_POST['subject'], $_POST['subject'], "FROM : " . $_POST['email'] . "\n");
        if ($sending) {
            $message = "Formulaire envoyé avec succès";
            $color = "green";
        } else {
            $message = "Echec lors de l'envoi du formulaire";
        }
    }
}

function PHPverifEmail($email)
{
    $isAnEmail = false;
    for ($i = 0; $i < strlen($email); $i++) {
        if ($email[$i] == "@") {
            if ($i < strlen($email) - 4) {
                for ($j = $i; $j < strlen($email) - 2; $j++) {
                    if ($email[$j] == ".") {
                        $isAnEmail = true;
                    }
                }
            }
        }
    }
    if ($isAnEmail == false) {
        return "Format d'email invalide";
    } else { }
}

function PHPverifObject($object)
{
    if (strlen($object) <= 10) {
        return "Champ object trop court";
    } else { }
}

function PHPverifSubject($subject)
{
    if (strlen($subject) <= 50) {
        return "Champ message trop court";
    } else { }
}

*/

?>

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