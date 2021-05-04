<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepoSorumlulari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('depo_sorumlulari', function (Blueprint $table) {
            $table->id('depo_sorumlu_id');
            $table->integer('depo_id');
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
        //
        Schema::dropIfExists('depo_sorumlulari');
    }
}
