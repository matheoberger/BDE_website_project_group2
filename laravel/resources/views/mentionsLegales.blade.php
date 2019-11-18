<!DOCTYPE html>
<html lang="fr">

<head>

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
    <title>Mentions</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/mentionsLegales.css">
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
                <div class="mentionsLegales__conteneur">
                    <div class="mentionsLegales__contenu">
                        <h2 class="mentionsLegales__title mentionsLegales--roboto">Mentions légales</h2>
                        <div class="CGV__navigation">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="breadcrumb--white" href='/'>Accueil</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Mentions légales
                                    </li>
                                </ol>
                            </nav>
                            <div>
                                <div>
                                    <h3>Editeur : Association BDE CESI Bordeaux</h3>
                                    <p class="mentionsLegales--roboto mentionsLegales__article ">
                                        Siège social :
                                        <br>
                                        264 Boulevard Godard, 33300 Bordeaux
                                        <br>
                                        Tél : 05 56 02 80 91
                                        <br>
                                        e-mail : bde.cesi.bordeaux.projetgroupe2@gmail.com
                                        <br>

                                    </p>

                                    <h3>Développement & hébergement</h3>
                                    <p class="mentionsLegales--roboto mentionsLegales__article ">
                                        Développé par les étudiants du cesi Bordeaux
                                        <br>
                                        264 Boulevard Godard, 33300 Bordeaux
                                        <br>
                                        Tél : 05 56 02 80 91
                                        <br>
                                        e-mail : bde.cesi.bordeaux.projetgroupe2@gmail.com
                                        <br>
                                    </p>
                                    <h3>Développement & hébergement</h3>
                                    <p class="mentionsLegales--roboto mentionsLegales__article ">
                                        Développé par les étudiants du cesi Bordeaux
                                        <br>
                                        264 Boulevard Godard, 33300 Bordeaux
                                        <br>
                                        Tél : 05 56 02 80 91
                                        <br>
                                        e-mail : bde.cesi.bordeaux.projetgroupe2@gmail.com
                                        <br>
                                    </p>
                                </div>
                                <div class="list-group mentionsLegales__group">
                                    <a class="list-group-item list-group-item-action" href="CGV">
                                        Conditions générales de vente
                                    </a>
                                    <a class="list-group-item list-group-item-action" href="CGcookies">Utilisation
                                        des
                                        cookies</a>
                                    <a class="list-group-item list-group-item-action" href="CGRDP">Données
                                        personnelles</a>
                                </div>
                            </div>
                        </div>
                        @include("partials/footer")
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>