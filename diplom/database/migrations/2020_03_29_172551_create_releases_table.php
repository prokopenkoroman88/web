<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->id();
            $table->string('name',125);
            $table->string('slug',250)->unique();//~ productslug-version     м.б. удалить??????
            $table->text('files');//!!+11.4.20
            $table->text('descr');//!!!!!!!описание товара
            //$table->string('file',128);//!!!!!img

            $table->float('price');
            $table->date('date');

            $table->unsignedBigInteger('included_id')->nullable();//releases
            $table->unsignedBigInteger('last_id')->nullable();//releases

            $table->unsignedBigInteger('product_id');//products
            $table->string('version',15);
            $table->string('server_version',15);
            $table->string('client_version',15);

//
//            $table->string('sku',10);//арткул строка
//            $table->float('mark')->default(0);//синхронно с myAdmin 



            $table->timestamps();


            $table->foreign('included_id')->references('id')->on('releases')->onDelete('set null');
            $table->foreign('last_id')->references('id')->on('releases')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('releases');
    }
}
