<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaSDDetail extends Model
{
  protected $table='siswaSDDetails';

  protected $fillable = ['id','siswaSDMaster_id', 'kecamatan_id','jmlSiswaSD','jmlLaki','jmlPerempuan'];

  public function siswaSDMaster()
  {
    $this->belongsTo(siswaSDMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
  
}
