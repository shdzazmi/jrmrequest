<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookBarangsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('driver');
            $table->string('plat');
            $table->string('tujuan');
            $table->string('barcode');
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
        Schema::drop('logbook_barangs');
    }
}
