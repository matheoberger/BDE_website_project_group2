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

if(session('role')){
    //echo session('role');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Event Type</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/eventType.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
            <div class="picture_gallery" id="js-picture-gallery"><br>    
                    
            </div>
            <aside>Pannel event :
                <br>
                
                
                <button class="btn add_picture">Ajouter photo         </button>
                <?php 
                    if(session('role') == 'Administrator'){
                        echo "<button class='btn edit_event'>Modifier l'event</button>";
                    };                
                 ?>
                
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
     var id = <?php echo $id ?>;
     <?php 
     
     if(session('role') == 'Moderator'){
        echo 'var button = "<button class=' . "'btn warning'" . '>Signaler</button>";';
     }

     if(session('role') == 'Administrator'){
        echo 'var button = "<button class=' . "'btn delete'" . '>Supprimer</button>";';
    }
    if(csrf_token()){
        echo 'var token = "' . csrf_token() . '";';
    };
    if(session('id_user')){
        echo 'var id_user = ' . session('id_user');
    }

     ?>
</script>
<script src="/js/insertDataToEvent.js">
    </script>




</html>
