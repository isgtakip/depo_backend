<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepoIdEkleMalzemeler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('malzemeler', function (Blueprint $table) {
            //
            $table->integer('depo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('malzemeler', function (Blueprint $table) {
            //
            $table->dropColumn('depo_id');
        });
    }
}
