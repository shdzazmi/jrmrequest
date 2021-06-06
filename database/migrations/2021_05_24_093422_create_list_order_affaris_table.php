<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOrderAffarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_order_affaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nourut');
            $table->string('uid');
            $table->string('nama');
            $table->string('barcode');
            $table->string('harga')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('subtotal')->nullable();
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
        Schema::dropIfExists('list_order_affaris');
    }
}
