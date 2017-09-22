<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Teilnehmer
 * @package App
 */
class Teilnehmer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teilnehmers';

    /**
     *
     */
    public function Anmeldungen() {
        return $this->hasMany(Anmeldung::class);
    }

    /**
     *
     */
    public function InstrumentEinschaetzung() {
        return $this->hasMany(InstrumentEinschaetzung::class);
    }

    /**
     * @return int|mixed
     */
    public function Alter() {
        if($this->Geburtstag !== null){
            return Carbon::parse($this->Geburtstag)->age;
        }
        else {
            return $this->Alter;
        }
    }
}
