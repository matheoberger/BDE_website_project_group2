<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('Title') Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
                <section class="login_container">
                    <div class="d-flex justify-content-center h-100">
                        <div class="card">
                            <!--Header du pannel-->
                            <div class="card-header">
                                <!--Titre du pannel-->
                                <h3>@yield('Title')</h3>
                                <!--Barre avec les liens des réseaux sociaux-->
                                <div class="d-flex justify-content-end social_icon">
                                    <span><a class="fab fa-facebook-square" href="https://www.facebook.com/"></a></span>
                                    <span><a class="fab fa-instagram" href="https://www.instagram.com/?hl=fr"></a></span>
                                    <span><a class="fab fa-twitter-square" href="https://twitter.com/?lang=fr"></a></span>
                                    <span><a class="fab fa-youtube-square" href="https://www.youtube.com/"></a></span>
                                    <span><a class="fab fa-linkedin" href="https://fr.linkedin.com/"></a></span>
                                </div>
                            </div>
                            <!--Corps du pannel-->
                            <div class="card-body">
                                <!--Formulaire commun à login et register-->
                                <form action="@yield('Title')Verif" method="post">
                                    @csrf
                                    <!--Division pour l'email-->
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <!--Icone de la division (font-awesome)-->
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <!-- Input pour l'email, prend la valeur entrée précédement ou celle en session-->
                                        <input type="text" name="email" class="form-control" placeholder="Email" required="required" <?php if (isset($_POST['email'])) {
                                                                                                                                            echo "value = '" . $_POST['email'] . "'";
                                                                                                                                        } elseif (isset($_COOKIE['email'])) {
                                                                                                                                            echo "value = '" . $_COOKIE['email'] . "'";
                                                                                                                                        }

                                                                                                                                        ?>>
                                    </div>
                                    <!-- Division pour le mot de passe  -->
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <!--Icone de la division (font-awesome)-->
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <!-- Input pour le mot de passe-->
                                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required">
                                    </div>
                                    <!--Section pour rajouter des inputs au formulaire (cas d'une inscription)-->
                                    @yield('form')
                                    <!--On affiche le message d'erreur s'il y en a-->
                                    <?php if (isset($error)) {
                                        echo "<p class='errorMessage'> $error </p>";
                                        //var_dump($error);
                                    } ?>

                                    <!--Division pour rajouter des checkbox au formulaire-->
                                    @yield('check')

                                    <!--Bouton pour envoyer le formulaire-->
                                    <div class="form-group">
                                        <input type="submit" name="checkbox" value="@yield('Title')" class="btn float-right login_btn">
                                    </div>
                                </form>
                            </div>
                            <!-- Footer du pannel-->
                            <div class="card-footer">
                                <!-- Premier lien-->
                                <div class="d-flex justify-content-center links">
                                    @yield('endlink1')
                                </div>
                                <!-- Second lien-->
                                <div class="d-flex justify-content-center links">
                                    @yield('endlink2')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include("partials/footer")
            </div>
        </div>
    </main>
</body>

</html>