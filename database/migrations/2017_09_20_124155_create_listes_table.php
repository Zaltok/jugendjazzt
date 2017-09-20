<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('typ');
            $table->string('raum');
            $table->timestamps();
        });
        Schema::create('liste_teilnehmer',function(Blueprint $table){
           $table->integer('liste_id')->unsigned()->index();
           $table->integer('teilnehmer_id')->unsigned()->index();
           $table->foreign('liste_id')->references('id')->on('listes')->onDelete('cascade');
           $table->foreign('teilnehmer_id')->references('id')->on('teilnehmers')->onDelete('cascade');
        });
        Schema::create('dozent_liste', function( Blueprint $table) {
           $table->integer('dozent_id')->unsigned()->index();
           $table->integer('liste_id')->unsigned()->index();
           $table->foreign('dozent_id')->references('id')->on('dozents')->onDelete('cascade');
           $table->foreign('liste_id')->references('id')->on('listes')->onDelete('cascade');
        });
        Schema::create('lied_liste', function (Blueprint $table){
            $table->integer('lied_id')->unsigned()->index();
            $table->foreign('lied_id')->references('id')->on('lieds')->onDelete('cascade');
            $table->integer('liste_id')->unsigned()->index();
            $table->foreign('liste_id')->references('id')->on('listes')->onDelete('cascade');
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
        Schema::dropIfExists('liste_teilnehmer');
        Schema::dropIfExists('dozent_liste');
        Schema::dropIfExists('lied_liste');
        Schema::dropIfExists('listes');
    }
}
