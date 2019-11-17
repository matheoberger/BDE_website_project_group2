<?php
$bdd = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd->prepare("CALL `getAllEvents`();");
$requete->execute();
$events = $requete->fetchAll();
$requete->closeCursor();
?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8" />


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
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
                <section>
                    <h1 class="formTitle">Ajouter un nouveau événement</h1>
                    <div>
                        <form method="post" action="newProduct">
                            @csrf
                            <label for="title">Titre (min 4 caractères) :</label>
                            <input type="text" id="title" name="title" placeholder="Titre de l'article" required="required" <?php if (isset($_POST['title'])) {
                                                                                                                                echo "value='" . $_POST['title'] . "'";
                                                                                                                            }; ?>>
                            <label for="place">Place :</label>
                            <input type="text" id="place" name="place" placeholder="Entrez le lieu de l'événement" required="required" <?php if (isset($_POST['place'])) {
                                                                                                                                            echo "value='" . $_POST['place'] . "'";
                                                                                                                                        }; ?>>
                            <label for="description">Description (10-255 caractères) :</label>
                            <textarea id="description" name="description" placeholder=" Ecrivez la description" required="required" style="height:100px"><?php if (isset($_POST['description'])) {
                                                                                                                                                                echo $_POST['description'];
                                                                                                                                                            }; ?></textarea>
                            <!-- Champ Objet -->
                            <label for="price">Prix :</label>
                            <input type="text" id="price" name="price" placeholder="Entrez le prix" required="required" <?php if (isset($_POST['price'])) {
                                                                                                                            echo "value='" . $_POST['price'] . "'";
                                                                                                                        }; ?>>
                            <label for="starting_date">Date de début :</label>
                            <input type="text" id="starting_date" name="starting_date" placeholder="Entrez la date de début (YYYY-MM-DD)" required="required" <?php if (isset($_POST['starting_date'])) {
                                                                                                                                                                    echo "value='" . $_POST['starting_date'] . "'";
                                                                                                                                                                }; ?>>

                            <label for="ending_date">Date de fin :</label>
                            <input type="text" id="ending_date" name="ending_date" placeholder="Entrez la date de fin  (YYYY-MM-DD)" required="required" <?php if (isset($_POST['ending_date'])) {
                                                                                                                                                                echo "value='" . $_POST['ending_date'] . "'";
                                                                                                                                                            }; ?>>
                            <select name="previous event" class="form-control">
                                <option value="null">Aucun événement précédent</option>
                                <?php
                                foreach ($events as $event) {
                                    echo "<option value='{$event['id_events']}'>{$event['title']}--{$event['id_events']}";
                                } ?>
                            </select>

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
    </main>
</body>

</html>