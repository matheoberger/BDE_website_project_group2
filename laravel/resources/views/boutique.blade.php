<!DOCTYPE html>
<html>

<head>
    <title>Boutique</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
                        src='https://mir-s3-cdn-cf.behance.net/project_modules/fs/a3ea7277681027.5c8f34c397dcf.jpg'>
                </div>
                <div class=topSelling>
                    <p>Les trois les plus vendus</p>


                    @include("partials/shopCarousel")
                </div>
                <p class=title>Produits</p>
                <div id="js-productContainer">

  
                    
                </div>
            </div>
            @include("partials/footer")
        </div>



    </main>
    <script src="js/products.js"></script>
</body>

</html>