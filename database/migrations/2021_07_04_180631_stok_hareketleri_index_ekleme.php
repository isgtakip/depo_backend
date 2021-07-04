<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokHareketleriIndexEkleme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stok_hareketleri', function (Blueprint $table) {
            //
                        $table->index('malzeme_id');
                        $table->index('miktar');
                        $table->index('hareket_tipi');
                        $table->index('hareket_tarihi');
                        $table->index('depo_id');
                        $table->index('firma_depo_id');
                        $table->index('tedarik_turu');
                        $table->index('belge_tipi_id');
                        $table->index('belge_no');
                        $table->index('sorumlu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stok_hareketleri', function (Blueprint $table) {
            //
        });
    }
}
