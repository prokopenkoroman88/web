<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();



            $table->string('name',100);
            $table->bigInteger('firm_id')->nullable();


            $table->string('email',100)->nullable();
            $table->string('phone',30)->nullable();
            $table->text('requirements');
            $table->text('offers');
            $table->string('hr_name',30)->nullable();

            $table->string('socnet',50)->nullable();
            $table->string('url',255)->nullable();
            $table->string('salary',20)->nullable();
            $table->date('refreshed')->nullable();








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
        Schema::dropIfExists('vacancies');
    }
}
