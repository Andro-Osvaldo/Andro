<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Pasien extends Model
{
    public function koneksi()
    {
        return $this->belongsToMany('App\Dokter','koneksi','pasien_id','dokter_id');
    }
}
