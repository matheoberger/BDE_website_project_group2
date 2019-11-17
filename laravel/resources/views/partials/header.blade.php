<header class="header">
    <nav class="customNavbar customNavbar--desktop">
        <a href="https://www.cesi.fr">
            <img src="https://www.cesi.fr/wp-content/uploads/2018/09/cesi-logo.png" class="customNavbar customNavbar__logo" alt="cesi_logo" />
        </a>
        <h1>BDE CESI BORDEAUX</h1>
        <div class="customNavbar customNavbar--right">

            <img src="/images/bell.png" class="customNavbar customNavbar__notification" alt="notification_bell" />

            <input type="text" class="customNavbar customNavbar_search">
            <a href="/panier">
                <img src="/images/panier.png" class="customNavbar customNavbar__panier" alt="basket_image" /></a>
            <?php if (session()->has('firstname') && session()->has('lastname')) {
                echo "<a class='customNavbar customNavbar__user' href='/disconnect'> Se déconnecter </a>";
            } else {
                echo "  <a class='customNavbar customNavbar__user' href='/login'> Se connecter </a>";
            }
            ?>
            <script>
                //Ligne pour supprimer cookie
                // document.cookie = "accept_cookie = cookie ; expires=" + new Date("1970-01-01").toUTCString() + "; path=/";
            </script>
            <?php
            if (!isset($_COOKIE['accept_cookie'])) {
                echo " <script src='js/cookie.js'></script> ";
            }

            ?>
        </div>

    </nav>
    <nav class="customNavbar customNavbar--mobile">

        <img src="/images/hamburger.png" id="js-hamburger" alt="mobile_menu_button" />

        <h1>BDE BORDEAUX</h1>
    </nav>
</header>