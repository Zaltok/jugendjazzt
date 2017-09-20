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
}