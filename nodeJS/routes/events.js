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
          `CALL ${"`getPhotoFromEvent`"}(${element.id_events})`,
          (error, results2, fields) => {
            console.log(results2);
            element.image = results2[0][0].url;
            resolve(element);
          }
        );
      });
      return element;
    })
  );
}

module.exports = {
  route: "/events/:start/:number",
  get: (req, res) => {
    if (!isNaN(Number(req.params.start)) && !isNaN(Number(req.params.number))) {
      connection.query(
        `CALL ${"`getEvents`"}(${req.params.start}, ${req.params.number})`,
        function(error, results, fields) {
          if (error) throw error;

          mapped(results[0]).then(() => {
            res.send(results[0]);
          });
        }
      );
    } else {
      res.sendStatus(405);
    }
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {},
  quit: () => {
    connection.end();
  }
};
