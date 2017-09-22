<?php

use Illuminate\Database\Seeder;
use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;

use Illuminate\Support\Facades\DB;

class VeranstaltungSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKeys();
        $this->truncate('veranstaltungs');

        $roles = [['bezeichnung' => 'Jugend Jazzt 2017', 'jahr' => 2017]];

        DB::table('veranstaltungs')->insert($roles);

        $this->enableForeignKeys();
    }
}
