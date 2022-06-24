<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->integer('asal');
            $table->integer('tunuan');
            $table->integer('titik_kumpul');
            $table->string('jam', 6);
            $table->integer('harga');
            $table->integer('modal');
            $table->integer('laba');
            $table->integer('id_vendor');
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
        Schema::dropIfExists('m_jadwal');
    }
}
