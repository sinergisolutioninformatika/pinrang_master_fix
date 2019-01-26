<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaSDMaster extends Model
{
  protected $table='siswaSDMasters';

  protected $fillable = ['id','ta','totalSiswaSD','totalLaki','totalPerempuan'];

  public function siswaSDDetail()
  {
    return $this->hasMany(siswaSDDetail::class,'siswaSDMaster_id','id');
  }
  
}
