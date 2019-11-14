<!DOCTYPE html>
<html>

<head>
    <title>@yield('Title') Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>@yield('Title')</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><a class="fab fa-facebook-square" href="https://www.facebook.com/"></a></span>
                        <span><a class="fab fa-instagram" href="https://www.instagram.com/?hl=fr"></a></span>
                        <span><a class="fab fa-twitter-square" href="https://twitter.com/?lang=fr"></a></span>
                        <span><a class="fab fa-youtube-square" href="https://www.youtube.com/"></a></span>
                        <span><a class="fab fa-linkedin" href="https://fr.linkedin.com/"></a></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="@yield('Title')/verif" method="post">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email" required="required" <?php if (isset($_POST['email'])) {
                                                                                                                                echo "value = '" . $_POST['email'] . "'";
                                                                                                                            } ?>>

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" <?php if (isset($_POST['password'])) {
                                                                                                                                            echo "value = '" . $_POST['password'] . "'";
                                                                                                                                        } ?>>
                        </div>
                        @yield('form')
                        <?php if (isset($_POST['error'])) {
                            echo "<p class='errorMessage'>" . $_POST['error'] . "</p>";
                        } ?>
                        <div class="row align-items-center remember">
                            <input type="checkbox">@yield('check')
                        </div>
                        <div class="form-group">
                            <input type="submit" name="checkbox" value="@yield('Title')" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        @yield('endlink1')
                    </div>
                    <div class="d-flex justify-content-center links">
                        @yield('endlink2')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>