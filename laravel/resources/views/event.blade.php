<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Event</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" href="/css/event.css" />
    <link rel="stylesheet" type="text/css" href="css/breadcrumb.css">


    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
                            <li class="breadcrumb-item active" aria-current="page">Evenements
                            </li>
                        </ol>
                    </nav>
                    <div>
                        <h2> <u>Les évènements</u></h2>
                    </div>
                    <?php
                    if (session('role') == 'Administrator') {
                        echo "<form action='/newEvent' method='get'>
                            <button class='btn add_event'>Ajouter un event</button>
                    </form> ";
                    };
                    ?>
                    <div id="js-contenair_event"></div>
                </div>
            </div>
            <script src="/js/insertEvent.js"></script>
        </div>
        </div>
        @include("partials/footer")

        </div>
    </main>
</body>

</html>