<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileCataloguesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_catalogues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nama');
            $table->string('kategori')->nullable();
            $table->string('file_path')->nullable();
            $table->string('cover_path')->nullable();
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
        Schema::drop('file_catalogues');
    }
}
