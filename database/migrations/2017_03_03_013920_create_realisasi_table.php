<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi', function (Blueprint $table) {
            $table->increments('idrealisasi');
            $table->string('nodo');
            $table->integer('idpesan');
            $table->date('tgl');
            $table->double('price');
            $table->integer('qty');
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
        Schema::drop('realisasi');
    }
}
