<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaSMPDetail extends Model
{
  protected $table='siswaSMPDetails';

  protected $fillable = ['id','siswaSMPMaster_id', 'kecamatan_id','jmlSiswaSMP','jmlLaki','jmlPerempuan'];

  public function siswaSMPMaster()
  {
    $this->belongsTo(siswaSMPMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
