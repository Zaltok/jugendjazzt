<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veranstaltung extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'veranstaltungs';
    public function Anmeldungen() {
        return $this->hasMany(Anmeldung::class);
    }

}
