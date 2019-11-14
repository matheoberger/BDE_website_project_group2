<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `nextEventsinBordeaux`();");
$requete->execute();
$nextEvents = $requete->fetchAll();
$requete->closeCursor();
$title1 = $nextEvents[0]['title'] . "-" . $nextEvents[0]['event_name'];
$title2 = $nextEvents[1]['title'] . "-" . $nextEvents[1]['event_name'];
$title3 = $nextEvents[2]['title'] . "-" . $nextEvents[2]['event_name'];
$src1 = $nextEvents[0]['url'];
$src2 = $nextEvents[1]['url'];
$src3 = $nextEvents[2]['url'];
?>

<div id="carousel1" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
        <a class="carousel-item active" href="#carousel1">
            <img class="caroussel__image" <?php echo "src=\"../$src1\" alt=\"$title1\"" ?>>
        </a>
        <a class="carousel-item" href="#carousel1">
            <img class="caroussel__image" <?php echo "src=\"$src2\" alt=\"$title2\"" ?>>
        </a>
        <a class="carousel-item" href="#carousel1">
            <img class="caroussel__image" <?php echo "src=\"$src3\" alt=\"$title3\"" ?>>
        </a>
    </div>
    <a class="carousel-control-prev" href="#carousel1" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel1" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>