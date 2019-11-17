<?php
if (session("email")) {
    $bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
    $requete = $bdd2->prepare("CALL `getBasketFromEmail`(:userID)");
    $requete->bindValue(":userID", session("email"), PDO::PARAM_STR);
    $requete->execute();
    $basket = $requete->fetchAll();
    $requete->closeCursor();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <title>Panier</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/breadcrumb.css">
    <link rel="stylesheet" type="text/css" href="css/panier.css">

</head>

<body>
    @include('partials/header')
    <main>
        @include("partials/navbar")
        <div class="conteneur">
            <div class="contenu">
                <div class="panier__body">
                    <h1 class="panier__title">Panier</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='/'>Accueil</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='boutique'>Boutique</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Panier
                            </li>
                        </ol>
                    </nav>

                </div>

                <ul class="list-unstyled">
                    <?php foreach ($basket as $product) {
                        $requete = $bdd2->prepare("CALL `getPhotoFromProduct`(:id_product)");
                        $requete->bindValue(":id_product", $product['id_products'], PDO::PARAM_STR);
                        $requete->execute();
                        $pictures = $requete->fetchAll();
                        $requete->closeCursor();
                        echo "<li class='media'>
                        <img src='/{$pictures[0]['url']}' class='mr-3' alt='...'>
                        <div class='media-body'>
                            <h5 class='mt-0 mb-1'>{$product['title']}</h5>
                            {$product['description']} --- {$product['price']} --- quantité : {$product['amount']}
                            <a href='/remove/{$product['id_products']}'>Retirer</a>
                        </div>
                        
                    </li>";
                    } ?>
                </ul>
                @include("partials/footer")
            </div>
        </div>

    </main>
</body>

</html>