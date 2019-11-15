<?php
$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `getProduct`(:id);");
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();
$product = $requete->fetchAll();
$requete->closeCursor();

$requete2 = $bdd2->prepare("CALL `getPhotoFromProduct`(:id);");
$requete2->bindValue(':id', $id, PDO::PARAM_INT);
$requete2->execute();
$images = $requete2->fetchAll();
$requete->closeCursor();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Article</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/css/app.css" />

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/article.css">
</head>

<body>

    @include('partials/header')
    <main>
        @include("partials/navbar")
            <div class="contenu">
                <div class="flexbox">
                    <div class="pictures">
                        <?php
                            foreach ($images as $element){
                               echo "<img src='/" . $element["url"] . "' class='image'>";
                            };
                        ?>
                        
                    </div>
                    <div class="text">
                        <div class="contenu__text"> 
                            <p class="title">
                                <?php echo $product[0]["title"] ?>
                            </p>
                            <p class="price">
                                <?php echo $product[0]["price"] ?>€
                            </p>
                        </div>
                        <div class="contenu__text"> 
                            <p class="size">
                            <select>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            </p>
                                <p class="buy">
                                    <button> Acheter </button>
                                </p>
                        </div>
                        <div class="contenu__text"> 
                            <p class="contact">

                            </p>
                            <p class="description">
                                <?php echo $product[0]["description"] ?>
                            </p>
                            <p class="buy">

                            </p>
                            <p class="return">
                                <a href="/boutique">Retour à la boutique</a>
                            </p>
                        </div>
                    </div>
                </div>
                @include("partials/footer")
            </div>

        </div>

    </main>
</body>

</html>