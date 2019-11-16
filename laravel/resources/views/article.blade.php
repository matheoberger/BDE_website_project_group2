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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="../js/bootstrap.bundle.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css" />

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
                    foreach ($images as $element) {
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
                            <button onclick="clickDetected();" type="button" data-toggle="popover" data-content="Article ajouté au panier." style="">
                                Acheter
                            </button>



                            <!-- <script>
                            $(function() {
                                $('[data-toggle="popover"]').popover()
                            })
                            $('.popover-dismiss').popover({
                                trigger: 'focus'
                            })
                            </script>
                            <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover"
                                data-trigger="focus" title="Dismissible popover"
                                data-content="And here's some amazing content. It's very engaging. Right?">Dismissible
                                popover</a> -->
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

<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            placement: 'left',
            trigger: 'focus'
        });
    });
</script>




<script>
    function clickDetected() {

        <?php
        if (session('email')) {

            $requete = $bdd2->prepare("CALL `newBasket`(:id);");
            $requete->bindValue(':id', $session('id_user'), PDO::PARAM_INT);
            $requete->execute();
            $product = $requete->fetchAll();
            $requete->closeCursor();
        }
        ?>

        console.log("article ajouté au panier");

        function setBasketArticle() {}
    }
</script>

</html>