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
            $table->string('nama');
            $table->string('barcode');
            $table->string('kd_supplier');
            $table->string('kendaraan');
            $table->string('part_number');
            $table->string('lokasi');
            $table->string('harga');
            $table->string('qty');
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
