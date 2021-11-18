<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->string('slug',128)->unique();//~
            $table->text('descr');//описание товара
            $table->string('img',128)->nullable();

            $table->float('price');
            $table->string('sku',10);//арткул строка
            //$table->tinyInteger('mark')->default(0);//синхронно с myAdmin 

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
        Schema::dropIfExists('products');
    }
}
