<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veranstaltung extends Model
{
    public function Anmeldungen() {
        return $this->hasMany(Anmeldung::class);
    }

}
