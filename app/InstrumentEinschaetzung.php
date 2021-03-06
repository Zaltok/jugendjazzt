<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstrumentEinschaetzung extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instrument_einschaetzungs';

    public function Instrument() {
        return $this->belongsTo(Instrument::class);
    }

    public function Teilnehmer() {
        return $this->belongsTo(Teilnehmer::class);
    }

}
