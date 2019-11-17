var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});
connection.connect();

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

async function getFilteredProductArray({ start, number }) {
  return new Promise(resolve => {
    connection.query(`CALL ${"`getAllProducts`"}()`, function(
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
        console.log(req.query);
        getFilteredProductArray(req.params).then(products => {
          console.log(products);
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
