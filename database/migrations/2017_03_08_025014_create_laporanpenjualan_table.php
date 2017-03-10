<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanpenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('laporanpenjualan', function (Blueprint $table) {
            $table->increments('idlaporanpenjualan');
            $table->date('tgl');
            $table->string('nota');
            $table->integer('idpembeli');
            $table->integer('qty');
            $table->integer('idbarang');
            $table->string('type');
            $table->double('price');
            $table->double('dpp');
            $table->double('ppn');
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
        Schema::drop('laporanpenjualan');
    }
}
