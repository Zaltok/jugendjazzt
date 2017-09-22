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

            $table->integer("Alter")->nullable()->default(0);
            $table->date("Geburtstag")->nullable();
            $table->string("PLZ")->nullable();
            $table->string("Ort")->nullable();
            $table->string("Strasse")->nullable();
            $table->string("Telefon")->nullable();
            $table->string("Mobil")->nullable();
            $table->string("Email")->nullable();
            $table->string("AGBB")->nullable("")->default("");
            $table->integer("eigeneEinschaetzung")->default(1);
            $table->boolean("bigband")->default(false);
            $table->boolean('combo')->default(false);
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
