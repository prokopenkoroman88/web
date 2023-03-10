require('dotenv').config();
const app = require("./app");
//??//const express = require("express");
//??//const app = express();
//??//const cors = require("cors");
const db = require("./core/db");//pool


//middleware
//??//app.use(cors());
//??//app.use(express.json());

//==============================================================================

const routerManager = require("./routers");

const app_port = process.env.APP_PORT;

app.listen(app_port, () => {
	console.log('server has started on port '+app_port);
});