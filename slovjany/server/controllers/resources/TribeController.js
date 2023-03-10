const CustomResourceController = require('./../CustomResourceController');

class TribeController extends CustomResourceController{
	constructor(){
		super('tribes');
	}
}

module.exports = TribeController;
