<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('idpenjualan');
            $table->string('nota');
            $table->date('tgl');
            $table->integer('idpembeli');
            $table->integer('idbarang');
            $table->integer('qty');
            $table->double('amount');
            $table->double('total');            
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
        Schema::drop('penjualan');
    }
}
