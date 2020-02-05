<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Operasi extends Model
{
    public function dokter()
    {
        return $this->hasMany('App\Dokter');
    }
}
