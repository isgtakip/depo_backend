<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokTakip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stok_takip', function (Blueprint $table) {
            $table->id('stok_takip_id');
            $table->integer('malzeme_id');
            $table->integer('irsaliye_id');
            $table->integer('miktar');
            $table->boolean('durum'); //0 gelen 1 çıkan
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('stok_takip');
    }
}
