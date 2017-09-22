<?php

use Illuminate\Database\Seeder;
use App\Teilnehmer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(UsersRolesSeeder::class);
         $this->call(VeranstaltungSeeder::class);
         //$this->call(AnmeldungSeeder::class);
         $this->call(InstrumentSeeder::class);

    }
}
