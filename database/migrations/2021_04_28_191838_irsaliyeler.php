<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Irsaliyeler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('irsaliyeler', function (Blueprint $table) {
            $table->id('irsaliye_id');
            $table->string('irsaliye_no');
            $table->integer('firma_id');
            $table->integer('depo_id')->default(1);
            $table->integer('sorumlu_personel_id');
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
        Schema::dropIfExists('irsaliyeler');
    }
}
