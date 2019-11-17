var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});
connection.connect();

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
      if (error) throw error;
      var str = "";

      results[0].forEach(e => {
        str += e.title.toUpperCase().replace(".", "") + " ";
      });

      str = str.split(" ");
      //uniq

      str = str.filter((value, index, self) => {
        return self.indexOf(value) === index;
      });

      str = str.filter((value, index, self) => {
        return value.indexOf(description.toUpperCase()) != -1;
      });
      console.log(str);
      resolve(str);
    });
  });
}

module.exports = {
  route: "/autocompletion/produits/",
  get: (req, res) => {
    getFilteredProductArray(req.params, req.query).then(products => {
      res.send(products);
    });
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {},
  quit: () => {
    connection.end();
  }
};
