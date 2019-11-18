/**
 * La classe insertProduct regroupe les méthodes
 * permettant le chargement depuis l'API de nouveaux
 * articles en les inserant directement en Jquery
 * dans le fichier HTML boutique
 */
class insertProduct {
    /**
     *
     * @param {number} articleIndex : représente le nombre d'article déjà chargé, utile pour l'API qui l'enverra à la procédure
     * @param {number} articleNumber  : représente le nnombre d'articles que l'on veut charger à partir de l'index
     *
     * New product régit toutes les méthodes de la classe insertProduct, un tableau de produit est d'abord chargé,
     * puis détaché en objets (les articles) puis mis en forme pour être insérés dans le fichier HTML
     *
     */

    newProduct(articleIndex, articleNumber, price, categorie, description) {
        $("#js-spinner").addClass("spinner__display");
        this.getProduct(
            articleIndex,
            articleNumber,
            price,
            categorie,
            description
        ).then(productList => {
            productList.forEach(this.createProduct.bind(this));
        });
    }

    /**
     *
     * @param {number} articleIndex : représente le nombre d'article déjà chargé, utile pour l'API qui l'enverra à la procédure
     * @param {number} articleNumber  : représente le nnombre d'articles que l'on veut charger à partir de l'index
     *
     * getProduct execute la requête HTTP get destinée à l'API, les données sont récupérées en asynchrone
     *
     */
    getProduct(articleIndex, articleNumber, price, categorie, description) {
        return new Promise(resolve => {
            var url = `http://localhost:3000/produits/${articleIndex}/${articleNumber}?`;

            if (description) {
                url += `description=${description}&`;
            }
            if (categorie) {
                url += `categorie=${categorie}&`;
            }
            if (price) {
                url += `prixMax=${price}&`;
            }
            console.log(url);
            $.get(url, function(data, status) {
                resolve(data);
            });
        });
    }

    /**
     *
     * @param {*} product
     *
     *createProduct permet de mettre en forme chaque article pour qu'ils puissent être insérés dans le fichier HTML
     *
     */

    createProduct(product) {
        var productElement = `<div class="product">
        <a href="/boutique/${product.id_products}"><img alt="product image" src="${product.image}" class="product__image"/></a>
        <div class="product__title">${product.title}</div>
        <div class="product__price"><b>${product.price}€</b></div>
    </div>`;
        this.loadProduct(productElement);
    }

    /**
     *
     * @param {*} productElement
     *
     * loadProduct insert productElement dans le div dépendant de la classe js-productContainer
     *
     */
    loadProduct(productElement) {
        $("#js-spinner").removeClass("spinner__display");
        $("#js-spinner").addClass("spinner__display--none");
        $("#js-productContainer").append(productElement);
    }
}

/**
 * Une fois que le document est "prêt",
 * une nouvelle classe inserProduct est crée puis on charge les articles
 * à chaque fois que la position du curseur dans la fenêtre atteint la fin du document
 *
 */

$(document).ready(function() {
    var articleIndex = 0;
    var numberArticleLoad = 3;
    var articleNumber = numberArticleLoad;
    var articleInc = numberArticleLoad;
    var categorie = "";
    var description = "";
    const productLoader = new insertProduct();

    documentPrice = document.getElementById("sliderValue").innerHTML;
    var price = documentPrice.substring(0, documentPrice.length - 1);

    // productLoader.newProduct(articleIndex, articleNumber);
    // articleIndex += articleInc;

    /**
     * On observe la page de la boutique pour savoir si le slider a été bougé,
     *  si c'est le cas, on clean la page et on la recharge avec le nouveau prix de la requête get
     */
    $(document).on("change", "#boutique__slider", function() {
        $("#js-productContainer").empty();
        articleIndex = 0;
        documentPrice = document.getElementById("sliderValue").innerHTML;
        price = documentPrice.substring(0, documentPrice.length - 1);
        $("#js-productContainer").empty();
        console.log("load product slider");
        productLoader.newProduct(
            articleIndex,
            articleNumber,
            price,
            categorie,
            description
        );
        articleIndex += articleInc;
    });

    /**
     * On observe l'onglet de choix de catégorie, si un nouvelle est selectionnée,
     * on recharge les articles avec le nouvel attribut
     */
    $("select")
        .change(function() {
            $("select option:selected").each(function() {
                categorie = "";
                articleIndex = 0;

                categorie += $(this).text();
                if (categorie == "Toutes") {
                    categorie = "";
                }
                $("#js-productContainer").empty();
                console.log("load product categorie");

                productLoader.newProduct(
                    articleIndex,
                    articleNumber,
                    price,
                    categorie,
                    description
                );
                articleIndex += articleInc;
            });
        })
        .change();

    $(".boutique__searchbar").on("keyup", function(e) {
        if (e.keyCode === 13) {
            description = document.getElementById("searchbar__value").innerHTML;
            console.log("searchSend ! ");
            console.log(description);
            $("#js-productContainer").empty();
            // $(window).scrollTop(0);
            articleIndex = 0;
            console.log("load product search");
            productLoader.newProduct(
                articleIndex,
                articleNumber,
                price,
                categorie,
                description
            );
            articleIndex += articleInc;
        }
    });

    /**
     * Dès que le scroll atteint le bas de la page, on appelle la suite des articles
     */
    $(window).scroll(function() {
        console.log($(window).scrollTop());
        console.log($(window).height());
        console.log($(document).height());
        if (
            Math.round($(window).scrollTop() + $(window).height()) >=
            $(document).height() - 1
        ) {
            productLoader.newProduct(
                articleIndex,
                articleNumber,
                price,
                categorie,
                description
            );
            articleIndex += articleInc;
        }
    });
});
