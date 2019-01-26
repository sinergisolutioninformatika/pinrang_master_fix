<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiSDMaster extends Model
{
    protected $table='kondisiSDMasters';

    protected $fillable = ['id','ta','totalSD','totalKondisiBaik','totalRusakRingan','totalRusakBerat'];

    public function kondisiSDDetail()
    {
      return $this->hasMany('App\Models\pendidikan\kondisiSDDetail','kondisiSDMaster_id','id');
    }
}
