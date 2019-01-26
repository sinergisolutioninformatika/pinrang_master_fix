<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiTKMaster extends Model
{
  protected $table='kondisiTKMasters';

  protected $fillable = ['id','ta','totalTK','totalKondisiBaik','totalRusakRingan','totalRusakBerat'];

  public function kondisiTKDetail()
  {
    return $this->hasMany('App\Models\pendidikan\kondisiTKDetail','kondisiTKMaster_id','id');
  }
}
