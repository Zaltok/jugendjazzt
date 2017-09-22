<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsNichtteilnehmenUndErhaltenZuTeilnehmers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anmeldungs', function (Blueprint $table) {
            $table->boolean("BandErhalten")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anmeldungs', function (Blueprint $table) {
            $table->removeColumn("BandErhalten");
        });
    }
}
