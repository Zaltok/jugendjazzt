<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    public function Teilnehmer() {
        return $this->belongsToMany(Teilnehmer::class);
    }
}
