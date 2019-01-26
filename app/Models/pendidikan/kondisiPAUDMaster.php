<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiPAUDMaster extends Model
{
  protected $table='kondisiPAUDMasters';

  protected $fillable = ['id','ta','totalPAUD','totalKondisiBaik','totalRusakRingan','totalRusakBerat'];

  public function kondisiPAUDDetail()
  {
    return $this->hasMany('App\Models\pendidikan\kondisiPAUDDetail','kondisiPAUDMaster_id','id');
  }
}
