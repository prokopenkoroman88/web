require('dotenv').config();
const app = require("./app");
//??//const express = require("express");
//??//const app = express();
//??//const cors = require("cors");
const db = require("./core/db");//pool

//import ResourceController from './common/CustomResourceController';//need a module
const ResourceController = require('./common/CustomResourceController');//imports class
const CustomRouter = require('./routers/CustomRouter');

//middleware
//??//app.use(cors());
//??//app.use(express.json());

//==============================================================================

//let tribeController = new ResourceController(app,db,'tribes');
//tribeController.routes();

//let tribeRouter = new CustomRouter('tribes');
//tribeRouter.controllerRoutes('TribeController');
let tribeRouter = new CustomRouter('tribes','TribeController');
tribeRouter.controllerRoutes();

const app_port = process.env.APP_PORT;

app.listen(app_port, () => {
	console.log('server has started on port '+app_port);
});