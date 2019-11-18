<!DOCTYPE html>
<html>

<head>
    <title>CGCookies</title>
    <meta charset="UTF-8" />

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="css/app.css" />

    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/breadcrumb.css">


</head>

<body>

    @include('partials/header')
    <main>
        @include("partials/navbar")
        <div class="conteneur">
            <div class="contenu">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='/'>Accueil</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb--white" href='/mentionsLegales'>Mentions
                                    légales</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Utilisation des cookies
                            </li>
                        </ol>
                    </nav>
                    <h2>Conditions générales d'utilisation des cookies</h2>
                    <p>Vous pouvez paramétrer vos préférences cookies par catégorie ou, de manière indépendante. Pour
                        une
                        expérience de navigation optimale, nous vous conseillons de garder l’activation des différentes
                        catégories de cookies.</p>
                </div>

            </div>
            @include("partials/footer")
        </div>
        </div>

    </main>
</body>

</html>