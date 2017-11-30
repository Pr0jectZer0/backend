<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Spiele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spiele', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('beschreibung');
            $table->integer('bewertungGes');
            $table->string('erscheinungsDatum');
            $table->integer('id_Genre');
            $table->integer('id_Publisher');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spiele');
    }
}
