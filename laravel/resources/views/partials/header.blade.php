<header class="header">
    <nav class="customNavbar customNavbar--desktop">
        <img src="https://www.cesi.fr/wp-content/uploads/2018/09/cesi-logo.png" class="customNavbar customNavbar__logo" />
        <h1>BDE CESI BORDEAUX</h1>
        <div class="customNavbar customNavbar--right">

            <img src="/images/bell.png" class="customNavbar customNavbar__notification" />

            <input type="text" class="customNavbar customNavbar_search">
            <img src="/images/panier.png" class="customNavbar customNavbar__panier" />
            <?php if (session()->has('firstname') && session()->has('lastname')) {
                echo "<a class='customNavbar customNavbar__user' href='/disconnect'> Se déconnecter </a>";
            } else {
                echo "  <a class='customNavbar customNavbar__user' href='/login'> Se connecter </a>";
            }
            ?>
            <script type="text/javascript">
                // document.cookie = "accept_cookie = cookie ; expires=" + new Date("1970-01-01").toUTCString() + "; path=/";
            </script>
            <?php
            if (!isset($_COOKIE['accept_cookie'])) {
                echo " <script type='text/javascript' src='js/cookie.js'></script> ";
            }

            ?>
        </div>

    </nav>
    <nav class="customNavbar customNavbar--mobile">
        <img src="/images/hamburger.png" class= />
        <h1>BDE BORDEAUX</h1>
    </nav>
</header>