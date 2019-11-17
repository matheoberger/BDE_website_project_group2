<?php

$bdd2 = new PDO("mysql:host=localhost;dbname=bde_cesi;charset=UTF8", "root", "");
$requete = $bdd2->prepare("CALL `getCategories`");
$requete->execute();
$categories = $requete->fetchAll();
$requete->closeCursor();
echo json_encode($categories);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Boutique</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/insertProduct.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/boutique.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

</head>

<body>

    @include('partials/header')
    <main>
        @include("partials/navbar")

        <div class="contenu">
            <div class="contenu__main">
                <div class=welcome--boutique><img class=welcome--boutique__image
                        src='https://mir-s3-cdn-cf.behance.net/project_modules/fs/a3ea7277681027.5c8f34c397dcf.jpg'
                        alt="welcom_image_shop">
                </div>

                <div class=topSelling>
                    <p>Les trois les plus vendus</p>
                    @include("partials/shopCarousel")
                </div>

                <div class="boutique__filter">
                    <nav class="navbar navbar-light bg-light filter__element">
                        <form class="form-inline">
                            <div class="input-group">

                                <input type="text" class="form-control" placeholder="rechercher un goodie"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </form>
                    </nav>
                    <div class="dropdown filter__element">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catégorie
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <select name="categories" multiple="multiple">
                                <option class='dropdown-item' href='#'>Toutes</option>
                                <?php foreach ($categories as $categorie) {
                                    echo "<option class='dropdown-item' href='#'>{$categorie["title"]}</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php foreach ($categories as $categorie) {
                                echo "<option selected='selected' class='dropdown-item' href='#'>{$categorie["title"]}</option>";
                            } ?>
                        </div>

                        <p>prix</p>
                        <div class="slidecontainer">
                            <input type="range" min="1" max="1000" value="50" class="slider" id="myRange"
                                oninput="slider(this.value)">
                        </div>
                        <p id="sliderValue"></p>

                    </div>

                </div>

                <p class=title>Produits</p>
                <div id="js-productContainer"></div>
                <div class="spinner-border" role="status" id="js-spinner">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            @include("partials/footer")
        </div>



    </main>
    <script src="js/products.js"></script>
</body>


<script>
function slider(val) {
    document.getElementById("sliderValue").innerHTML = val + "€";
}
</script>

</html>