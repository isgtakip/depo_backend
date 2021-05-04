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
        Schema::create('stok_hareketleri', function (Blueprint $table) {
            $table->id('hareket_id');
            $table->integer('malzeme_id');
            $table->integer('miktar');
            $table->integer('hareket_tipi'); //giris_cikis
            $table->dateTime('hareket_tarihi');//date time 
            $table->integer('depo_id'); //hareket 
            $table->integer('firma_depo_id');
            $table->integer('belge_tipi');
            $table->string('belge_no');


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
        Schema::dropIfExists('stok_hareketleri');
    }
}
