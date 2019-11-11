<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <main>
        <section class="main__pannel">
            <a class="main__pannel__box main__pannel__box--shop" href="">
                <h2 class="main__pannel__box__title"> Boutique </h2>
            </a>
            <a class="main__pannel__box main__pannel__box--event" href="">
                <h2 class="main__pannel__box__title"> Evénements</h2>
            </a>
            <div class="main__pannel__box">
                @include('templates.shopCarousel')
            </div>
            <div class="main__pannel__box">
                @include('templates.eventCarousel')
            </div>
            <div class="main__pannel__networkbox">
                <span></span>
            </div>
            <div class="main__pannel__contactbox">
                <h2>Contactez nous ! Donnez nous des idées !</h2>
                <form action="/action_page.php"></form>
                <label for="email"></label>
                <input type="text" id="email" name="email" placeholder="Entrez votre adresse électronique">
                <label for="object"></label>
                <input type="text" id="object" name="object" placeholder="Entrez votre l'objet de votre message">
                <label for="subject"></label>
                <textarea id="subject" name="subject" placeholder="Ecrivez votre message..." style="height:200px"></textarea>
                <input type="submit" value="Envoyer">
            </div>
        </section>
    </main>
</body>