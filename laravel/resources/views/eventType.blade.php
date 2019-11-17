<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `getEvent`(:id);");
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();
$event = $requete->fetchAll();
$requete->closeCursor();
if (empty($event)) {
    http_response_code(404);
    die();
}

$requete2 = $bdd2->prepare("CALL `getPhotoFromEvent`(:id);");
$requete2->bindValue(':id', $id, PDO::PARAM_INT);
$requete2->execute();
$images = $requete2->fetchAll();
$requete->closeCursor();

$requete3 = $bdd2->prepare("CALL `isRegistered`(:id, :event);");
$requete3->bindValue(':id', session('id_user'), PDO::PARAM_INT);
$requete3->bindValue(':event', $id, PDO::PARAM_INT);
$requete3->execute();
$isRegistered = $requete3->fetchAll();
$requete->closeCursor();
if (session('role')) {
    //echo session('role');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Event Type</title>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/eventType.css" />
    <link rel="stylesheet" href="/css/header.css" />




</head>

<body>

    @include('/partials/header')

    <main>

        <div>
            <h2><?php echo $event[0]["title_events"] ?></h2>
        </div>
        <div class="conteneur">

            <section>
                <article>
                    <h3><?php echo $event[0]["place"] ?></h3>
                    <p><?php echo $event[0]["description"] ?></p>
                </article>
                <div class="picture_gallery" id="js-picture-gallery"><br>

                </div>
                <aside>Pannel event :
                    <br>
                    <?php echo "<form action='/addpicture/$id'>
                        <button type='submit' class='btn add_picture'>Ajouter photo </button>
                    </form>" ?>

                    <?php
                    if (session('role') == 'Administrator') {
                        echo "<form action='/event/$id/edit/' method='get'><button class='btn edit_event'>Modifier event</button></form>";
                        echo "<form action='/event/delete' method='post'>
                                <input type='hidden' name='event' value='$id'>
                                <button class='btn edit_event'>Supprimer event</button></form>";
                    };
                    ?>
                    <?php

                    if (empty($isRegistered)) {
                        echo '
                    <form action="/event/participate" method="post">
                        <input type="hidden" name="event" value="' . $id . '"/>
                        <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                        <button type="submit" class="btn participate">' . "Participer à l'event"  . '</button>
                    </form>';
                    } else {
                        echo '
                    <form action="/event/leave" method="post">
                        <input type="hidden" name="event" value="' . $id . '"/>
                        <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                        <button type="submit" class="btn participate">' . "Quitter l'event"  . '</button>
                    </form>';
                    };
                    echo '<form action="/download/' . $id . '">
                    <select name="format" required>
                        <option value="">-- Choisissez le format --</option>
                        <option value="csv">CSV</option>
                        <option value="pdf">PDF</option>
                    </select>
                    <button type="submit" class="btn download">Télécharger</button>
                </form>'

                    ?>

                </aside>



            </section>

        </div>

    </main>
    <script>
        var id = <?php echo $id ?>;
        <?php

        if (session('role') == 'Moderator') {
            echo 'var button = "<button class=' . "'btn warning'" . '>Signaler</button>";';
        }

        if (session('role') == 'Administrator') {
            echo 'var button = "<button class=' . "'btn delete'" . '>Supprimer</button>";';
        }
        if (csrf_token()) {
            echo 'var token = "' . csrf_token() . '";';
        };
        if (session('id_user')) {
            echo 'var id_user = ' . session('id_user') . ';';
        }
        if (!empty($isRegistered)) {
            echo 'var registered = true;';
        }
        if (empty($isRegistered)) {
            echo 'var registered = false;';
        }

        ?>
    </script>
    <script src="/js/insertDataToEvent.js">
    </script>
</body>






</html>
