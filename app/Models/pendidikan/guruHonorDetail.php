<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruHonorDetail extends Model
{
  protected $table='guruHonorDetails';

  protected $fillable = ['id','guruHonorMaster_id', 'kecamatan_id','jmlGuruHonor','jmlGuruTKHonor','jmlGuruSDHonor','jmlGuruSMPHonor'];

  public function guruHonorMaster()
  {
    $this->belongsTo(guruHonorMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
