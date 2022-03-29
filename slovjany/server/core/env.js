const env = new Map();

//key names from Laravel .env:
env.set('DB_CONNECTION','');//mysql
env.set('DB_HOST','localhost');//'127.0.0.1'
env.set('DB_PORT',5432);//5432
env.set('DB_DATABASE','slovjany');
env.set('DB_USERNAME','postgres');//postgres
env.set('DB_PASSWORD','postgres');

env.set('APP_PORT',5000);//5000


module.exports = env;