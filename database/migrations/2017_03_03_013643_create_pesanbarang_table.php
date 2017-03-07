<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanbarang', function (Blueprint $table) {
            $table->increments('idpesan');
            $table->string('kode');
            $table->string('noso');
            $table->date('tgl');
            $table->integer('idbarang');
            $table->string('status');
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
        Schema::drop('pesanbarang');
    }
}
