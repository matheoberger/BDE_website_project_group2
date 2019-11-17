var mysql = require("mysql");
var connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "bde_cesi"
});
connection.connect();
//lie les events à leurs images
async function mapped(results) {
  return Promise.all(
    results.map(async function(element) {
      await new Promise(resolve => {
        connection.query(
          `CALL ${"`getPhotoFromEvent`"}(${element.id_events})`,
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

module.exports = {
  route: "/events/:start/:number",
  get: (req, res) => {
    if (!isNaN(Number(req.params.start)) && !isNaN(Number(req.params.number))) {
      connection.query(
        `CALL ${"`getEvents`"}(${req.params.start}, ${req.params.number})`,
        function(error, results, fields) {
          if (error) throw error;
          mapped(results[0]).then(() => {
            results[0].sort((a, b) => {
              return Date.parse(a.starting_date) - Date.parse(b.starting_date);
            });
            res.send(results[0]);
          });
        }
      );
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
