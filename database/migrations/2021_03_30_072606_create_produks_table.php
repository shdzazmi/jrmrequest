<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('ketnama')->nullable();
            $table->string('barcode');
            $table->string('kd_supplier');
            $table->string('kendaraan');
            $table->string('partno1');
            $table->string('partno2');
            $table->string('lokasi1');
            $table->string('lokasi2');
            $table->string('lokasi3');
            $table->integer('harga');
            $table->integer('harga2');
            $table->integer('harga3');
            $table->integer('hargamin');
            $table->integer('qty');
            $table->integer('qtyTk');
            $table->integer('qtyGd');
            $table->string('satuan');
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
        Schema::dropIfExists('produks');
    }
}
