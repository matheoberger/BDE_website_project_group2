<!DOCTYPE html>
<html>
  <head>
    <title>Event Type</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/eventType.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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

                <div class="public_img">
                    <img src=${image} alt="party">
                    <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
                    <p>Like : [nb_like]</p>
                    <button class="btn warning">Signaler</button>
                    <button class="btn delete">Supprimer</button>
                    <div class="comments">Commentaires :<br>
                        <div class="comment">
                            [comments]
                        </div>
                        <div class="comment">
                            [comments]
                        </div>
                        <div class="comment">
                            [comments]
                        </div>
                    </div>
                </div>
                <div class="public_img">
                    <img src=${image} alt="image de l'event">
                    <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
                    <p>Like : [nb_like]</p>
                    <button class="btn warning">Signaler</button>
                    <button class="btn delete">Supprimer</button>
                    <div class="comments">Commentaires :<br>
                        <div class="comment">
                            [comments]
                        </div>
                        <div class="comment">
                            [comments]
                        </div>
                        <div class="comment">
                            [comments]
                        </div>
                    </div>
                </div>

            </div>
            <aside>Pannel event :
                <br></br>
                <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
                <p>Like : [nb_like]</p>
                <button class="btn add_comment">Ajouter un commentaire</button>
                <button class="btn add_picture">Ajouter photo         </button>
                <button class="btn edit_event">Modifier l'event       </button>
                <button class="btn participate">Participer à l'event  </button>

            </aside>



        </section>

    </div>

</main>
  </body>

  <script>
                            function likeDislike(x) {
                            x.classList.toggle("fa-thumbs-down");
                            }
                            </script>

</html>
