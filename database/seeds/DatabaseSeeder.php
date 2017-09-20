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
        $jsonStr = file_get_contents("https://randomname.de/?format=json&count=25");
        $objekte = json_decode($jsonStr);
        $instrument = array("Drums", "Bass", "Gitarre", "Klavier", "Alt-Saxophon", "Tenor-Saxophon", "Klarinette");
        foreach ($objekte as $value) {
            $teilnehmer = new Teilnehmer();
            $teilnehmer->Nachname = $value->lastname;
            $teilnehmer->Vorname = $value->firstname;
            $teilnehmer->Alter = rand(12, 22);
            $teilnehmer->PLZ = 27283;
            $teilnehmer->Ort = "Verden";
            $teilnehmer->Strasse = "Heisterkamp 10";
            $teilnehmer->Telefon = "0123456";
            $teilnehmer->Mobil = "0123456";
            $teilnehmer->Instrument1 = $instrument[rand(0,6)];
            $teilnehmer->Instrument1Seit = rand(0,6);
            $teilnehmer->Instrument1Unt = rand(0,6);
            $teilnehmer->save();
        }
    }
}
