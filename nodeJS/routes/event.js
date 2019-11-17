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
          `CALL ${"`getCommentFromPhoto`"}(${element.id_pictures})`,
          (error, results2, fields) => {
            if (error) throw error;
            element.comments = results2[0];
            resolve(element);
          }
        );
      });
      return element;
    })
  );
}

module.exports = {
  route: "/event/:id/",
  get: (req, res) => {
    if (!isNaN(Number(req.params.id))) {
      connection.query(
        `CALL ${"`getPhotoFromEvent`"}(${req.params.id})`,
        function(error, results, fields) {
          if (error) throw error;
          mapped(results[0]).then(() => {
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
