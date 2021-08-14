<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_service_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('nourut')->nullable();
            $table->string('type')->nullable();
            $table->string('barcode');
            $table->string('ketnama')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('keterangan')->nullable();
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
        Schema::drop('list_service_orders');
    }
}
