<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function InstrumentEinschaetzung() {
        $this->belongsToMany(InstrumentEinschaetzung::class, "instrument_einschaetzung_teilnehmer", "teilnehmer_id", "ie_id");
    }

    public function Alter() {
        if($this->Geburtstag !== null){
            return Carbon::parse($this->Geburtstag)->age;
        }
        else {
            return $this->Alter;
        }
    }
}
