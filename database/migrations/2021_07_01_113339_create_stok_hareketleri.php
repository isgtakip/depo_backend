<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokHareketleri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_hareketleri', function (Blueprint $table) {
            $table->id('hareket_id');
            $table->integer('malzeme_id');
            $table->integer('miktar');
            $table->integer('hareket_tipi');
            $table->date('hareket_tarihi');
            $table->integer('depo_id');
            $table->integer('firma_depo_id');
            $table->integer('tedarik_turu');
            $table->integer('belge_tipi_id');
            $table->string('belge_no');
            $table->integer('sorumlu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_hareketleri');
    }
}
