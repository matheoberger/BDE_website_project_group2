<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `bestSellinBordeaux`();");
$requete->execute();
$bestProducts = $requete->fetchAll();
$requete->closeCursor();
$i = 0;

foreach ($bestProducts as $product) {
    ${'title' . $i} = $product['title'] . "-" . $product['product_name'];
    ${'src' . $i} = $product['url'];
    ${'link' . $i} = $product['id_products'];
    $i++;
}
?>

<div id="carousel2" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($bestProducts as $product) {
            if ($i == 0) {
                echo "<li data-target='#carousel2' data-slide-to='$i' class='active'></li>";
            } else {
                echo "<li data-target='#carousel2' data-slide-to='$i'></li>";
            }
            $i++;
        }
        ?>
    </ul>

    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($bestProducts as $product) {
            if ($i == 0) {
                echo "<a class='carousel-item active' href='article/${'link' .$i}'>
                <img class='caroussel__image' src='../${'src' .$i}' alt='${'title' .$i}' ></a>";
            } else {
                echo "<a class='carousel-item' href='article/${'link' .$i}'>
                <img class='caroussel__image' src='../${'src' .$i}' alt='${'title' .$i}' ></a>";
            }
            $i++;
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carousel2" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel2" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>