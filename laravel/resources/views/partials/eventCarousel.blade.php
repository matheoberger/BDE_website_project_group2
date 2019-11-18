<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `nextEventsinBordeaux`();");
$requete->execute();
$nextEvents = $requete->fetchAll();
$requete->closeCursor();
$i = 0;
foreach ($nextEvents as $event) {
    ${'title' . $i} = $event['title'] . "-" . $event['event_name'];
    ${'src' . $i} = $event['url'];
    ${'link' . $i} = $event['id_events'];
    $i++;
}
?>

<div id="carousel1" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($nextEvents as $event) {
            if ($i == 0) {
                echo "<li data-target='#carousel1' data-slide-to='$i' class='active'></li>";
            } else {
                echo "<li data-target='#carousel1' data-slide-to='$i'></li>";
            }
            $i++;
        }
        ?>
    </ul>
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($nextEvents as $event) {
            if ($i == 0) {
                echo "<a class='carousel-item active' href='event/${'link' .$i}'>
                <img class='caroussel__image' src='../${'src' .$i}' alt='${'title' .$i}' ></a>";
            } else {
                echo "<a class='carousel-item' href='event/${'link' .$i}'>
                <img class='caroussel__image' src='../${'src' .$i}' alt='${'title' .$i}' ></a>";
            }
            $i++;
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carousel1" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel1" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>