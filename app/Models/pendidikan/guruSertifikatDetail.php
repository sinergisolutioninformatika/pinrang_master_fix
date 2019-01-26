<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruSertifikatDetail extends Model
{
  protected $table='guruSertifikatDetails';

  protected $fillable = ['id','guruSertifikatMaster_id', 'kecamatan_id','jmlGuruSertifikat','jmlGuruTKSertifikat','jmlGuruSDSertifikat','jmlGuruSMPSertifikat'];

  public function guruSertifikatMaster()
  {
    $this->belongsTo(guruSertifikatMaster::class);
  }
  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
