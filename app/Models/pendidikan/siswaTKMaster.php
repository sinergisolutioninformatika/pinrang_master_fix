<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaTKMaster extends Model
{
  protected $table='siswaTKMasters';

  protected $fillable = ['id','ta','totalSiswaTK','totalLaki','totalPerempuan'];

  public function siswaTKDetail()
  {
   return $this->hasMany('App\Models\pendidikan\siswaTKDetail','siswaTKMaster_id','id');
  }
}
