const env = require('./env');
const Pool = require("pg").Pool;

const pool = new Pool({
	host: env.get('DB_HOST'),
	port: env.get('DB_PORT'),
	database: env.get('DB_DATABASE'),
	user: env.get('DB_USERNAME'),
	password: env.get('DB_PASSWORD')
});

module.exports = pool;