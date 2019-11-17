<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Event</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="/css/app.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/event.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>

<body>
@include('partials/header')
@include("partials/navbar")

<main>

    <div class="conteneur">

           <div>
                <h2> <u>Les évènements</u></h2>
            </div>
            <?php
                if (session('role') == 'Administrator') {
                    echo "<form action='/event/addEvent' method='get'>
                            <button class='btn add_event'>Ajouter un event</button>
                    </form> ";
                };
            ?>

            <div id="js-contenair_event"></div>



</div>

        <script src="/js/insertEvent.js"></script>
        </main>
</body>
</html>
