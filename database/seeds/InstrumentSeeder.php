<?php

use Illuminate\Database\Seeder;

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;

use Illuminate\Support\Facades\DB;

class InstrumentSeeder extends Seeder
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
        $this->truncate('instruments');

        $instruments = [
            [
                'bezeichnung' => 'Gesang',
                'kuerzel' => 'voc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Trompete',
                'kuerzel' => 'tp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Posaune',
                'kuerzel' => 'tb',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Drums',
                'kuerzel' => 'dr',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Gitarre',
                'kuerzel' => 'git',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Klarinette',
                'kuerzel' => 'cl',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Tenor Saxophon',
                'kuerzel' => 'tsax',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Alt Saxophon',
                'kuerzel' => 'asax',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Barriton Saxophon',
                'kuerzel' => 'barsax',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Saxophon',
                'kuerzel' => 'sax',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Bass',
                'kuerzel' => 'b',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
            ,
            [
                'bezeichnung' => 'Querflöte',
                'kuerzel' => 'fl',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Piano',
                'kuerzel' => 'p',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Horn',
                'kuerzel' => 'hrn',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Euphonium',
                'kuerzel' => 'euph',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bezeichnung' => 'Fagot',
                'kuerzel' => 'fag',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('instruments')->insert($instruments);
        $this->enableForeignKeys();
    }
}
