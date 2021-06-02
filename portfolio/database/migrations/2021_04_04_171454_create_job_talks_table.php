<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_talks', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('firm_id');
            $table->bigInteger('vacancy_id');
            $table->dateTime('when');
            $table->string('by',100);

            $table->text('descr')->nullable();


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
        Schema::dropIfExists('job_talks');
    }
}
