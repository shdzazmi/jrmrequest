<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestbarangsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestbarangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('barcode')->nullable();
            $table->string('kd_supplier')->nullable();
            $table->string('kendaraan')->nullable();
            $table->string('partno1')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('user')->nullable();
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
        Schema::drop('requestbarangs');
    }
}
