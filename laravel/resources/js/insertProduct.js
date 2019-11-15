/**
 * La classe insertProduct regroupe les méthodes
 * permettant le chargement depuis l'API de nouveaux
 * articles en les inserant directement en Jquery
 * dans le fichier HTML boutique
 */
class insertProduct {
    newProduct(baseArticleNumber, articleNumber) {
        this.getProduct(baseArticleNumber, articleNumber).then(productList => {
            productList.forEach(this.createProduct.bind(this));
        });
        articleNumber += 3;
    }

    getProduct(baseArticleNumber, articleNumber) {
        console.log("getProduct");
        return new Promise(resolve => {
            $.get(
                `http://localhost:3000/produits/${baseArticleNumber}/${articleNumber}`,
                function(data, status) {
                    resolve(data);
                }
            );
        });
    }

    createProduct(product) {
        console.log(product);
        var productElement = `<div class="product">
        <a href="/article/${product.id_products}"><img src="${product.image}" class="product__image"/></a>
        <div class="product__title">${product.title}</div>
        <div class="product__price"><b>${product.price}€</b></div>
    </div>`;
        this.loadProduct(productElement);
    }

    loadProduct(productElement) {
        $("#js-productContainer").append(productElement);
    }
}
$(document).ready(function() {
    var baseArticleNumber = 0;
    var numberArticleLoad = 3;
    var articleNumber = numberArticleLoad;
    var articleInc = numberArticleLoad;
    const coucou = new insertProduct();

    coucou.newProduct(baseArticleNumber, articleNumber);
    baseArticleNumber += articleInc;

    $(window).scroll(function() {
        console.log("scorl");
        if (
            Math.round($(window).scrollTop() + $(window).height()) ==
            $(document).height()
        ) {
            console.log(articleNumber);
            coucou.newProduct(baseArticleNumber, articleNumber);
            baseArticleNumber += articleInc;
        }
    });
});
