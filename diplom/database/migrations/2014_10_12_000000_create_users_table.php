<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);//Константин Константинович Переверникрученко-Белоцерковский

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',60);
            $table->string('role',20)->nullable();//+ роль юзер гость админ

            $table->string('phone',20)->nullable();
            //+380-(93)-137-41-52

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
