<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('nama');
            $table->string('barcode');
            $table->string('kd_supplier');
            $table->string('kendaraan');
            $table->string('partno1');
            $table->string('partno2');
            $table->string('lokasi1');
            $table->string('lokasi2');
            $table->string('lokasi3');
            $table->string('harga');
            $table->integer('qty');
            $table->float('subtotal');
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
        Schema::dropIfExists('list_orders');
    }
}
