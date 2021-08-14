<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukCataloguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kendaraan')->nullable();
            $table->string('partno1')->nullable();
            $table->string('partno2')->nullable();
            $table->integer('harga')->nullable();
            $table->string('merek')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_catalogues');
    }
}
