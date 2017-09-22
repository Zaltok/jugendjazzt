<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnmeldungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anmeldungs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('veranstaltung_id')->unsigned();
            $table->integer('teilnehmer_id')->unsigned();
            $table->integer('hauptinstrument_id')->unsigned()->nullable();
            $table->foreign('hauptinstrument_id', "anm_hins")->references('id')->on('instruments')->onDelete("cascade");
            $table->integer('zweitinstrument_id')->unsigned()->nullable();
            $table->foreign('zweitinstrument_id', "anm_zins")->references('id')->on('instruments')->onDelete("cascade");
            $table->integer('uebernachtung')->default(0);
            $table->text('bemerkung')->nullable();
            $table->boolean('angemeldet')->default(false);
            $table->boolean('helfer')->default(false);
            $table->boolean('bezahlt')->default(false);
            $table->boolean('elternerklaerung')->default(false);
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
        Schema::dropIfExists('anmeldungs');
    }
}
