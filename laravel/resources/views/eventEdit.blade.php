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
if (session('role')) {
    if (session('role') != "Administrator") {
        http_response_code(403);
        die();
    }
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

    @include('partials.header')

    <main>

        <div>
            <input id="title" name="description" value="<?php echo $event[0]["title_events"] ?>"></input>
        </div>
        <div class="conteneur">

            <section>
                <article>
                    <form action="/editEvent" method="post" id="editEvent-Form">
                        <input name="event" type="hidden" value="<?php echo $id; ?>"></input>
                        <input name="_token" type="hidden" value="<?php echo csrf_token(); ?>"></input>
                        <input id="place" name="place" value="<?php echo $event[0]["place"] ?>"></input>
                        <textarea id="description" name="description"><?php echo $event[0]["description"] ?></textarea>
                        <input name="title" id="titleReplacer" type="hidden"></input>
                    </form>
                </article>
                <div class="picture_gallery" id="js-picture-gallery"><br>

                </div>
                <aside>Pannel event :
                    <br>
                    <button class='btn edit_event' id="save">Sauvegarder</button>
                </aside>



            </section>

        </div>

    </main>
</body>

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
<!-- <script src="/js/insertDataToEvent.js"> -->
<script src="/js/editEvent.js">
</script>




</html>