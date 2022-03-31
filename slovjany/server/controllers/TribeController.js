const CustomController = require('./CustomController');

class TribeController extends CustomController{
	constructor(){
		super('tribes');
	}
}

module.exports = TribeController;