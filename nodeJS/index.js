const express = require("express");
const app = express();
const port = 3000;
const RouteHandler = require("./RouteHandler.js");

app.use("/", RouteHandler.serve());

app.listen(port, () => console.log(`Example app listening on port ${port}!`));
