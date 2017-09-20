<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teilnehmer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teilnehmers';

    public function Anmeldungen() {
        $this->hasMany(Anmeldung::class);
    }

    public function Instrumente() {
        $this->belongsToMany(Instrument::class);
    }
}
