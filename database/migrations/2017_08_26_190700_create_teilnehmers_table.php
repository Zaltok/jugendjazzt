<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeilnehmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teilnehmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nachname");
            $table->string("Vorname");

            $table->integer("Alter")->nullable();
            $table->date("Geburtstag")->nullable();
            $table->string("PLZ")->nullable("");
            $table->string("Ort")->nullable("");
            $table->string("Strasse")->nullable("");
            $table->string("Telefon")->nullable("");
            $table->string("Mobil")->nullable("");
            $table->string("Instrument1")->nullable("");
            $table->integer("Instrument1Seit")->nullable()->default(0);
            $table->integer("Instrument1Unt")->nullable(0);
            $table->boolean("Angemeldet")->default(false);
            $table->boolean("Bezahlt")->default(false);
            $table->boolean("Helfer")->default(false);
            $table->boolean("BescheinigungErhalten")->default(false);
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
        Schema::dropIfExists('teilnehmers');
    }
}
