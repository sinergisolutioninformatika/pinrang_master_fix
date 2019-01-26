<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiSMPMaster extends Model
{
  protected $table='kondisiSMPMasters';

  protected $fillable = ['id','ta','totalSMP','totalKondisiBaik','totalRusakRingan','totalRusakBerat'];

  public function kondisiSMPDetail()
  {
    return $this->hasMany('App\Models\pendidikan\kondisiSMPDetail','kondisiSMPMaster_id','id');
   
  }
}
