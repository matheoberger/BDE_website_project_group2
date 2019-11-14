var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});

module.exports = {
  route: "/events/:page",
  get: (req, res) => {
    connection.connect();
    connection.query("SELECT * FROM events", function(error, results, fields) {
      if (error) throw error;
      console.log(req.params);
      res.send(results[1]);
    });
    connection.end();
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {}
};
