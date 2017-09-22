<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentEinschaetzungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_einschaetzungs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instrument_id')->unsigned()->index();
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
            $table->integer('seit')->nullable();
            $table->integer('unterricht_seit')->nullable();
            $table->timestamps();
        });
        Schema::create('instrument_einschaetzung_teilnehmer', function (Blueprint $table) {
            $table->integer('ie_id')->unsigned()->index();
            $table->foreign('ie_id')->references('id')->on('instrument_einschaetzungs')->onDelete('cascade');
            $table->integer('teilnehmer_id')->unsigned()->index();
            $table->foreign('teilnehmer_id')->references('id')->on('teilnehmers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrument_einschaetzung_teilnehmer');
        Schema::dropIfExists('instrument_einschaetzungs');
    }
}
