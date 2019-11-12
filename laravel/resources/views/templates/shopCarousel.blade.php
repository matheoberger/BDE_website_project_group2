<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `bestSellinBordeaux`();");
$requete->execute();
$bestProducts = $requete->fetchAll();
$requete->closeCursor();
$title1 = $bestProducts[0]['title'] . "-" . $bestProducts[0]['product_name'];
$title2 = $bestProducts[1]['title'] . "-" . $bestProducts[1]['product_name'];
$title3 = $bestProducts[2]['title'] . "-" . $bestProducts[2]['product_name'];
$src1 = $bestProducts[0]['url'];
$src2 = $bestProducts[1]['url'];
$src3 = $bestProducts[2]['url'];
?>

<div id="carousel2" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#carousel2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel2" data-slide-to="1"></li>
        <li data-target="#carousel2" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
        <a class="carousel-item active" href="#carousel2">
            <img class="caroussel__image" <?php echo "src=\"../$src1\" alt=\"$title1\"" ?>>
        </a>
        <a class="carousel-item" href="#carousel2">
            <img class="caroussel__image" <?php echo "src=\"$src2\" alt=\"$title2\"" ?>>
        </a>
        <a class="carousel-item" href="#carousel2">
            <img class="caroussel__image" <?php echo "src=\"$src3\" alt=\"$title3\"" ?>>
        </a>
    </div>
    <a class="carousel-control-prev" href="#carousel2" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel2" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>