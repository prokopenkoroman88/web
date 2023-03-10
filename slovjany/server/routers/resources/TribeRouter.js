const CustomResourceRouter = require("./../CustomResourceRouter");

class TribeRouter extends CustomResourceRouter{
	constructor(){
		super('tribes','TribeController');
	}
}

module.exports = TribeRouter;
