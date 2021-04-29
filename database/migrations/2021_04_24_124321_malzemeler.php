<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Malzemeler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('malzemeler', function (Blueprint $table) {
            $table->id('malzeme_id');
            $table->string('malzeme_adi');
            $table->string('malzeme_birim');
            $table->integer('malzeme_miktar')->default(0);
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
        Schema::dropIfExists('malzemeler');
    }
}
