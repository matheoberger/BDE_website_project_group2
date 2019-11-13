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

    <link rel="stylesheet" type="text/css" href="css/footer.css">

</head>

<body>

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
                            <img src="../images/party_merica.jpg" alt="merica">
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>


                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>
                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>

                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>

                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>

                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>

                    <section>
                        <article>Photo + Bouton
                        </article>
                        <div class="event_description">
                            <aside><u>Nom et description de l'évènement</u></aside>
                            <aside>Meilleurs photos de l'évènement</aside>
                        </div>
                    </section>

                </div>

            </div>
            @include("partials/footer")
        </div>
        </div>

    </main>
</body>

</html>