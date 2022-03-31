const express = require("express");
const app = express();
const cors = require("cors");
//const path = require("path");

//middleware
app.use(cors());
app.use(express.json());
//app.use(express.static(path.resolve(__dirname, 'static')))
//app.use(fileUpload({}))

module.exports = app;