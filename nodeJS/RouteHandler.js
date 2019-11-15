const fs = require("fs");
var express = require("express");
var router = express.Router();
let routes = [];
//Liste les fichiers dans le dossier routes et ajoute leur Objet à la liste "routes"
fs.readdirSync("routes").forEach(file => {
  routes.push(require("./routes/" + file));
});

//Classe pour handle les routes
class RouteHandler {
  constructor(routes, router) {
    this.routes = routes;
  }
  //récupère les objets dans routes et les serve via la library Express (app.get)
  serve() {
    routes.forEach(route => {
      router.get(route.route, route.get);
      router.post(route.route, route.post);
      router.put(route.route, route.put);
      router.delete(route.route, route.delete);
    });
    //console.log(this.routes);
    return router;
  }
}
module.exports = new RouteHandler(routes, router);
