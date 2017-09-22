<?php

use Illuminate\Database\Seeder;
use App\Anmeldung;
use App\Teilnehmer;

class AnmeldungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonStr = file_get_contents("https://randomname.de/?format=json&count=25");
        $objekte = json_decode($jsonStr);
        $instrument = array("Drums", "Bass", "Gitarre", "Klavier", "Alt-Saxophon", "Tenor-Saxophon", "Klarinette");
        foreach ($objekte as $value) {
            $teilnehmer = Teilnehmer::where("Nachname", $value->lastname)->where("Vorname", $value->firstname)->get();
            if($teilnehmer->count() == 1) {

            }
            else{
                $teilnehmer = new Teilnehmer();
                $teilnehmer->Nachname = $value->lastname;
                $teilnehmer->Vorname = $value->firstname;
                $teilnehmer->Alter = rand(12, 22);
                $teilnehmer->PLZ = 27283;
                $teilnehmer->Ort = "Verden";
                $teilnehmer->Strasse = "Heisterkamp 10";
                $teilnehmer->Telefon = "0123456";
                $teilnehmer->Mobil = "0123456";
                $teilnehmer->save();

            }

        }
    }
}
