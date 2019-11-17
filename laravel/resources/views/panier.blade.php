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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
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

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='/'>Accueil</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='boutique'>Boutique</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Panier
                            </li>
                        </ol>
                    </nav>
                    <h5 class="panier__title">Détail de votre panier</h5>

                    <div>

                        <div class="panier__commande">
                            <h3>TOTAL : <?php
                                        $total = 0;
                                        foreach ($basket as $product) {
                                            $requete = $bdd2->prepare("CALL `getPhotoFromProduct`(:id_product)");
                                            $requete->bindValue(":id_product", $product['id_products'], PDO::PARAM_STR);
                                            $requete->execute();
                                            $pictures = $requete->fetchAll();
                                            $requete->closeCursor();
                                            $total += $product['price'] * $product['amount'];
                                        }
                                        echo "$total €"; ?> </h3>
                            <a href="/order ">

                                <h3 class="panier__roboto">Commander</h3>
                            </a>
                        </div>

                        <div>
                            <ul class="list-unstyled">
                                <?php
                                $total = 0;
                                foreach ($basket as $product) {
                                    echo "
                        <li class='media'>  
                        <div class='panier__article'>

                        <div><img src='/{$pictures[0]['url']}' class='mr-3 panier__img' alt='...'></div>

                        <div class='media-body article__body'  style='clear:right'>
               
                            <h3 class='mt-0'>{$product['title']}</h3>
                             {$product['price']}€ - quantité : {$product['amount']}
                            </div>
                            <a href='/remove/{$product['id_products']}'>Retirer</a>
                            <form  name = 'amount_form' action='/amount/{$product['id_products']}'>
                            <input placeholder='Entrez une quantité' type='text' id='amount' name='amount' required'>
                            </form>
                
                        </div>
                    </li>";
                                } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                @include("partials/footer")
            </div>
        </div>
    </main>
</body>

</html>