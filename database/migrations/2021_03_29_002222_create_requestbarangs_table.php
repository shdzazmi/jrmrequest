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
            $table->string('kendaraan');
            $table->string('part_number');
            $table->string('keterangan');
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
