class insertProduct {
    getProduct() {
        console.log("coucou");

        return new Promise(resolve => {
            let product = $.get("http://localhost:3000/produits/2/3", function(
                data,
                status
            ) {
                resolve(data);
            });
        });
    }
    createProduct(data) {}
}
$(document).ready(function() {
    const coucou = new insertProduct();
    coucou.getProduct().then(data => {
        console.log(data);
    });
    coucou.createProduct();
});
