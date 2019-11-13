<!DOCTYPE html>
<html>
  <head>
    <title>Event Type</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/eventType.css" />
    <link rel="stylesheet" href="/css/header.css" />


<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  </head>
  <body>

  @include('partials/header')

<main>

    <div>
        <h2>[Nom de l'event]</h2>
    </div>
    <div class="conteneur">

        <section>
            <article>
                <h3>[Titre event]</h3>
                <p>[Description de l'event]</p>
            </article>
            <div class="picture_gallery">Galerie de photos de l'event<br>
                Mettre les photos au même forma à la suite, respecter le responsive et mettre en dessous de chaque photos:<br>
                -[user] Button like<br>
                -[modo] Button signaler<br>
                -[Admin] Button supprimer<br></br>
                [imgs]
                <div class="public_img">
                    <img src="../images/party.jpg" alt="party">
                    <p>Like : [nb_like]</p>
                    [button signaler]
                    [button supprimer]
                </div>

            </div>
            <aside>Commentaires :<br>
                <div class="comments">
                    <div class="comment">
                        [comments]
                    </div>


                </div>
            </aside>
            <aside>[[user]ajout/supp Like][[user]ajout commentaire][[admin]ajout photo][[admin]editer nom/descr][[user]inscription/désinscription event]</aside>



        </section>

    </div>

</main>
  </body>
</html>
