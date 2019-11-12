module.exports = {
  route: "/produits/:id/:truc",
  get: (req, res) => {
    res.send(req.params);
  },
  post: (req, res) => {},
  put: (req, res) => {},
  delete: (req, res) => {}
};
