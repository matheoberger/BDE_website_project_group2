var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});

module.exports = {
  route: "/produits/:start/:number",
  get: (req, res) => {
    connection.connect();
    if (typeof req.params.id == Number && typeof req.params.number == Number) {
      connection.query(
        `CALL ${"`getProducts`"}(${req.params.start}, ${req.params.number})`,
        function(error, results, fields) {
          if (error) throw error;
          console.log(req.params);
          res.send(results[1]);
        }
      );
    } else {
      res.send(405);
    }

    connection.end();
    res.send(req.params);
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {}
};
