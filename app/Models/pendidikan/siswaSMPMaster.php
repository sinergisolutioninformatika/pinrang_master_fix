<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaSMPMaster extends Model
{
  protected $table='siswaSMPMasters';

  protected $fillable = ['id','ta','totalSiswaSMP','totalLaki','totalPerempuan'];

  public function siswaSMPDetail()
  {
   return $this->hasMany(siswaSMPDetail::class,'siswaSMPMaster_id','id');
  }
}
