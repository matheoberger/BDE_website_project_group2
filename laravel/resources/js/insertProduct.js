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
    newProduct(articleIndex, articleNumber) {
        if(){
        $("js-spinner").addClass("spinner__display");
        }
        this.getProduct(articleIndex, articleNumber).then(productList => {
            $("js-spinner").removeClass("spinner__display");
            $("js-spinner").addClass("spinner__display--none");
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

    getProduct(articleIndex, articleNumber) {
        return new Promise(resolve => {
            $.get(
                `http://localhost:3000/produits/${articleIndex}/${articleNumber}`,
                function(data, status) {
                    resolve(data);
                }
            );
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
        <a href="/article/${product.id_products}"><img src="${product.image}" class="product__image"/></a>
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
    const coucou = new insertProduct();

    coucou.newProduct(articleIndex, articleNumber);
    articleIndex += articleInc;

    $(window).scroll(function() {
        console.log($(window).scrollTop());
        console.log($(window).height());
        console.log($(document).height());
        if (
            Math.round($(window).scrollTop() + $(window).height()) >=
            $(document).height() - 10
        ) {
            console.log("sscroll");
            coucou.newProduct(articleIndex, articleNumber);
            articleIndex += articleInc;
        }
    });
});
