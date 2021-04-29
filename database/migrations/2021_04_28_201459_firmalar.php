<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Firmalar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('firmalar', function (Blueprint $table) {
            $table->id('firma_id');
            $table->string('firma_unvan');
            $table->integer('firma_tur'); //0 ana firma 1 taşeron
            $table->integer('firma_tip'); //0 sahis 1 tüzel
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
        Schema::dropIfExists('firmalar');
    }
}
