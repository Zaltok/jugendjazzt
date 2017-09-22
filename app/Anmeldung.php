<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anmeldung extends Model
{

    public function Veranstaltung()
    {
        return $this->belongsTo(Veranstaltung::class);
    }

    public function Teilnehmer() {
        return $this->belongsTo(Teilnehmer::class);
    }

    public function Hauptinstrument() {
        return $this->belongsTo(Instrument::class, 'hauptinstrument_id', 'id');

    }

    public function Zweitinstrument() {
        return $this->belongsTo(Instrument::class, 'zweitinstrument_id', 'id');
    }
}