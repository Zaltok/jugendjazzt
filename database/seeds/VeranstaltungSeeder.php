<?php

use Illuminate\Database\Seeder;

class VeranstaltungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //$this->disableForeignKeys();
        //$this->truncate('veranstaltungs');

        $roles = [['bezeichnung' => 'Jugend Jazzt 2017', 'jahr' => 2017]];

        DB::table('veranstaltungs')->insert($roles);

        //$this->enableForeignKeys();
    }
}
