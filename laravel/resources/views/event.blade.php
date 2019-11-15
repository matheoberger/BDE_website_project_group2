<!DOCTYPE html>
<html>

<head>
    <title>Event</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/app.css" />

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


    @include('partials/header')
    <main>
        @include("partials/navbar")
        <div class="conteneur">
            <div class="contenu">
                <div>
                    <h2> <u>Les évènements</u></h2>
                </div>
                <div class="conteneur">


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


<?php

    if(isset($_POST['title_events'])){

    $message = array();

    $message['title_events'] = $_POST['title_events'];
    $message['place'] = $_POST['place'];
    $message['description'] = $_POST['description'];
    $message['starting_date'] = date("d/m/Y");
    $message['ending_date'] = date("d/m/Y");
    $message['image'] = $_POST_['image'];
    $message['price'] = $_POST['price'];
    $message['id'] = ['id'];

    $js = file_get_contents('message.json');
    $js = js_decode($js, true);
    $js[] = $message;

    }

php?>


</html>
