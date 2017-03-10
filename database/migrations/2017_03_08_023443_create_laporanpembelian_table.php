<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanpembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanpembelian', function (Blueprint $table) {
            $table->increments('idlaporanpembelian');
            $table->string('kode');
            $table->string('idpesan');//noso
            $table->date('tglpesan');
            $table->integer('idbarang');//namabarang
            $table->string('idrealisasi');//nodo
            $table->date('tglrealisasi');
            $table->integer('qty');
            $table->double('price');
            $table->double('total');
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
        Schema::drop('laporanpembelian');
    }
}
