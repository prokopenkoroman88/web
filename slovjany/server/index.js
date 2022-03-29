require('dotenv').config();
const express = require("express");
const app = express();
const cors = require("cors");
const db = require("./core/db");//pool

//import ResourceController from './common/CustomResourceController';//need a module
const ResourceController = require('./common/CustomResourceController');//imports class

//middleware
app.use(cors());
app.use(express.json());

//==============================================================================

let tribeController = new ResourceController(app,db,'tribes');
tribeController.routes();


const app_port = process.env.APP_PORT;

app.listen(app_port, () => {
	console.log('server has started on port '+app_port);
});