<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

</head>

<body>
    @include('partials/header')
    <main>
        @include("partials/navbar")
        <div class="conteneur">
            <div class="contenu">
                <!-- Composant principal de la page WEB-->
                <section class="main__pannel">
                    <!-- Division comportant le lien vers la boutique-->
                    <div class="main__pannel__box --bordered-left --bordered-top">
                        <a class="main__pannel__box_image--shop" href="">
                            <h2 class="main__pannel__box__title"> Boutique </h2>
                        </a>
                    </div>
                    <!-- Division comportant le lien vers les événements-->
                    <div class="main__pannel__box --bordered-right --bordered-top">
                        <a class="main__pannel__box_image--event" href="">
                            <h2 class="main__pannel__box__title"> Evénements</h2>
                        </a>
                    </div>
                    <!-- Carousel comportant les trois produits les plus vendus à Bordeaux -->
                    <div class="main__pannel__box --carousel --bordered-left --gradient">
                        @include('partials.shopCarousel')
                    </div>
                    <!-- Carousel comportant les trois prochains événements se déroulant Bordeaux -->
                    <div class="main__pannel__box --carousel --bordered-right">
                        @include('partials.eventCarousel')
                    </div>
                    <!-- Division comportant les moyens de communication entre BDE et utilisateurs-->
                    <section class="main__pannel__com">
                        <!-- Division réseaux sociaux-->
                        <div class="main__pannel__box --networkbox ">
                            <div class="networkbox__container">
                                <!--Titre de la division-->
                                <h2>Rejoignez nous sur les réseaux sociaux !</h2>
                                <!-- Division comportant les liens des réseaux sociaux-->
                                <div class="networkbox__logocontainer">
                                    <a class="networkbox__logo" href=""><img src="../images/twitterLogo.png" alt="logo_twitter"></img></a>
                                    <a class="networkbox__logo" href=""><img src="../images/fblogo.png" alt="logo_fb"></img></a>
                                    <a class="networkbox__logo" href=""><img src="../images/instalogo.png" alt="logo_insta"></img></a>
                                    <a class="networkbox__logo" href=""><img src="../images/linkedinlogo.png" alt="logo_linkedin"></img></a>
                                    <a class="networkbox__logo" href=""><img src="../images/ytblogo.png" alt="logo_youtube"></img></a>
                                    <a class="networkbox__logo" href=""><img src="../images/pinterestlogo.jpg" alt="logo_pinterest"></img></a>
                                </div>
                            </div>
                        </div>
                        <!-- Division formulaire de contact-->
                        <div class="main__pannel__box --contactbox">
                            <!-- Titre de la division-->
                            <h2>Contactez nous ! Donnez nous des idées !</h2>
                            <form action="contactForm" method="post" onsubmit="return verifForm(this)">
                                @csrf
                                <!-- Champ Email -->
                                <label for="email">Email :</label>
                                <input type="text" id="email" name="email" placeholder=" Entrez votre adresse E-mail" required="required">
                                <!-- Champ Objet -->
                                <label for="object">Objet (min 10 caractères) :</label>
                                <input type="text" id="object" name="object" placeholder=" Entrez l'objet de votre message" required="required" ">
                                <!-- Champ Texte -->
                                <label for=" subject">Message (min 50 caractères) :</label>
                                <textarea id="subject" name="subject" placeholder=" Ecrivez votre message..." required="required"></textarea>
                                <?php if (isset($_POST['error'])) {
                                    echo "<p class='errorMessage'>" . "mdp incorect" . "</p>";
                                };
                                ?>
                                <!-- Bouton envoyer -->
                                <input class=" --contactbox__button" type="submit" value="Envoyer">
                            </form>
                        </div>
                    </section>
                </section>
                @include("partials/footer")
            </div>

        </div>
        </div>

    </main>
</body>

</html>