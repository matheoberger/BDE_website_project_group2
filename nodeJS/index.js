const express = require("express");
var cors = require("cors");
const app = express();
const port = 3000;
const RouteHandler = require("./RouteHandler.js");

app.use(cors());

app.use("/", RouteHandler.serve());
//starting API
app.listen(port, () => console.log(`listening on port ${port}!`));

app.use("/", RouteHandler.serve());
