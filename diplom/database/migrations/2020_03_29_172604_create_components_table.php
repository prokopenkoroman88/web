<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('release_id');//releases
            $table->unsignedBigInteger('application_id');//applications
            //!!!!!!//$table->text('describe');


            $table->timestamps();

            $table->foreign('release_id')->references('id')->on('releases')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            //при удалении (хоть катег хоть продуктов) удалит и промежуточные записи

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
