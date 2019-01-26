<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class siswaTKDetail extends Model
{
  protected $table='siswaTKDetails';

  protected $fillable = ['id','siswaTKMaster_id', 'kecamatan_id','jmlSiswaTK','jmlLaki','jmlPerempuan'];

  public function siswaTKMaster()
  {
    $this->belongsTo(siswaTKMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
