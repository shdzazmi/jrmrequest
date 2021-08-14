<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->integer('nourut');
            $table->string('no_penawaran');
            $table->string('uid');
            $table->string('nama');
            $table->string('mobil');
            $table->string('nopol');
            $table->string('status');
            $table->string('tanggal');
            $table->string('operator');
            $table->string('outlet');
            $table->string('approve_service');
            $table->string('approve_produk');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_orders');
    }
}
