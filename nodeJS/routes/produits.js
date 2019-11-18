var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});
connection.connect();
//lie les produits à leurs images
async function mapped(results) {
  return Promise.all(
    results.map(async function(element) {
      await new Promise(resolve => {
        connection.query(
          `CALL ${"`getPhotoFromProduct`"}(${element.id_products})`,
          (error, results2, fields) => {
            if (error) throw error;
            element.image = results2[0][0].url;
            resolve(element);
          }
        );
      });
      return element;
    })
  );
}
/**
 * @function getBasicProductArray renvoie une liste des produits
 * @param {Number} start index à partir duquel l'array est lu
 * @param {Number} number nombre de valeurs à renvoyer
 */
async function getBasicProductArray({ start, number }) {
  return new Promise(resolve => {
    connection.query(`CALL ${"`getProducts`"}(${start}, ${number})`, function(
      error,
      results,
      fields
    ) {
      if (error) throw error;
      mapped(results[0]).then(() => {
        resolve(results[0]);
      });
    });
  });
}
/**
 * @function getFilteredProductArray renvoie une liste des produits filtrés
 * @param {*} start index à partir duquel l'array est lu
 * @param {*} number nombre de valeurs à renvoyer
 */
async function getFilteredProductArray(
  { start, number },
  {
    categorie = ["Goodies", "Pictures", "Clothes"],
    prixMin = -Infinity,
    prixMax = Infinity,
    description
  }
) {
  return new Promise(resolve => {
    connection.query(`CALL ${"`getAllProducts`"}()`, function(
      error,
      results,
      fields
    ) {
      if (!description) {
        var noDesc = true;
      }
      if (error) throw error;
      mapped(results[0]).then(() => {
        results[0] = results[0].filter(e => {
          if (noDesc) {
            description = e.title;
          }
          return (
            e.price < prixMax &&
            e.price > prixMin &&
            categorie.indexOf(e.categorie) != -1 &&
            (e.title.indexOf(description) != -1 ||
              e.description.indexOf(description) != -1)
          );
        });
        resolve(results[0].slice(start, start + number));
      });
    });
  });
}

module.exports = {
  route: "/produits/:start/:number",
  get: (req, res) => {
    if (!isNaN(Number(req.params.start)) && !isNaN(Number(req.params.number))) {
      //check if query is empty
      if (
        Object.entries(req.query).length === 0 &&
        req.query.constructor === Object
      ) {
        getBasicProductArray(req.params).then(products => {
          res.send(products);
        });
      } else {
        getFilteredProductArray(req.params, req.query).then(products => {
          res.send(products);
        });
      }
    } else {
      res.sendStatus(403);
    }
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {},
  quit: () => {
    connection.end();
  }
};
