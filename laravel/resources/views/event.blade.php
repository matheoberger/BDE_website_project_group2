<!DOCTYPE html>
<html>

<head>
    <title>Event</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/app.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/event.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>

<body>
@include('partials/header')
<main>

    <main>
    <div class="conteneur">

           <div>
                <h2> <u>Les évènements</u></h2>
            </div>
            <div id="js-contenair_event"></div>

            <section>
                <article>
                <input type="image" src="../images/party_merica.jpg" name="saveForm" class="btTxt_submit" id="saveForm" />
                </article>
                <div class="event_description">
                    <aside>
                    [titre_event]
                    [description_event]
                    </aside>
                </div>

            </section>

</div>

        <script src="/js/insertEvent.js"></script>

</html>
