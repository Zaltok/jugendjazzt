<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function InstrumentEinschaetzung() {
        return $this->hasMany(InstrumentEinschaetzung::class);
    }

    public function AnmeldungenAlsHauptinstrument() {
        return $this->hasMany("Anmeldung", "hauptinstrument_id", "id");
    }
    public function AnmeldungenAlsZweitinstrument() {
        return $this->hasMany("Anmeldung", "zweitinstrument_id", "id");
    }
}
