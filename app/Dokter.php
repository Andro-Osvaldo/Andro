<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Dokter extends Model
{
    public function ruangan()
    {
        return $this->belongsTo('App\Ruangan');
    }
    public function operasi()
    {
        return $this->belongsTo('App\Operasi');
    }
    public function koneksi()
    {
        return $this->belongsToMany('App\Pasien','koneksi','dokter_id','pasien_id');
    }
}
