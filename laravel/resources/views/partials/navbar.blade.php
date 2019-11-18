<nav class="sidebar sidebar--desktop" id="js-navbar">
    <a href="/"><img src="https://media.discordapp.net/attachments/637676594768510978/642315646272536576/logo_BDE_1.png?width=702&height=702" class="sidebar sidebar__logo" alt="bde_bordeaux_logo" /></a>
    <a href="/" class="link">Accueil</a>
    <a href="/boutique" class="link">Boutique</a>
    <a href="/event" class="link">Evénements</a>
    <?php
    if (session('role') == 'Moderator' || session('role') == 'Administrator') {
        echo " <a href='/downloadAll' class='link'>Download pictures</a>";
        echo " <a href='/newProduct' class='link'>Ajouter produit</a>";
        echo " <a href='/newEvent' class='link'>Ajouter événements</a>";
    } ?>
</nav>
<script src="/js/navbar.js"></script>