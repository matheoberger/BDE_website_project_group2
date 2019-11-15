const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/index.js", "public/js")
    .js("resources/js/insertProduct.js", "public/js")
    .js("resources/js/insertDataToEvent.js", "public/js")
    .js("resources/js/navbar.js", "public/js")

    .js("resources/js/cookie.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/header.scss", "public/css")

    .sass("resources/sass/index.scss", "public/css")
    .sass("resources/sass/contactForm.scss", "public/css")
    .sass("resources/sass/login.scss", "public/css")

    .sass("resources/sass/navbar.scss", "public/css")
    .sass("resources/sass/event.scss", "public/css")
    .sass("resources/sass/article.scss", "public/css")
    .sass("resources/sass/footer.scss", "public/css")
    .sass("resources/sass/responsive.scss", "public/css")
    .sass("resources/sass/mentionsLegales.scss", "public/css")
    .sass("resources/sass/breadcrumb.scss", "public/css")
    .sass("resources/sass/CGV.scss", "public/css")
    .sass("resources/sass/eventType.scss", "public/css")
    .sass("resources/sass/panier.scss", "public/css")
    .sass("resources/sass/boutique.scss", "public/css");
