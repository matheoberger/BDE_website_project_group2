<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `getEvent`(:id);");
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();
$event = $requete->fetchAll();
$requete->closeCursor();

$requete2 = $bdd2->prepare("CALL `getPhotoFromEvent`(:id);");
$requete2->bindValue(':id', $id, PDO::PARAM_INT);
$requete2->execute();
$images = $requete2->fetchAll();
$requete->closeCursor();

//echo print_r($event[0]);
//echo print_r($event);

/*
$title1 = $event[0]['title'] . "-" . $event[0]['product_name'];

$src1 = $event[0]['url'];
*/

?>

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
        <h2><?php echo $event[0]["title_events"] ?></h2>
    </div>
    <div class="conteneur">

        <section>
            <article>
                <h3><?php echo $event[0]["title_events"] ?></h3>
                <p><?php echo $event[0]["description"] ?></p>
            </article>
            <div class="picture_gallery"><br>
                <?php foreach ($images as $element){

                    echo '<div class="public_img">
                        <img src="/' . $element["url"] . '" alt="party">
                        <i onclick="likeDislike(this)" class="fa fa-thumbs-up"></i>
                        <p>Like : ' . $element["nbrlike"] . '</p>
                        <button class="btn warning">Signaler</button>
                        <button class="btn delete">Supprimer</button>
                        <div class="comments">Commentaires :<br>
                        </div>
                        </div>
                    ';
                    }; 
                ?>
                
                    
                    
                    
                    
                    
                        
                    
            </div>
            <aside>Pannel event :
                <br>
                <button class="btn add_comment">Ajouter un commentaire</button>
                <button class="btn add_picture">Ajouter photo         </button>
                <button class="btn edit_event">Modifier l'event       </button>
                <button class="btn participate">Participer à l'event  </button>
                <button class="btn download">Télécharger</button>

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
