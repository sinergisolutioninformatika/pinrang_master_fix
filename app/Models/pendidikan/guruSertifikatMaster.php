<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruSertifikatMaster extends Model
{
  protected $table='guruSertifikatMasters';

  protected $fillable = ['id','ta','totalGuruSertifikat','totalGuruTKSertifikat','totalGuruSDSertifikat','totalGuruSMPSertifikat'];

  public function guruSertifikatDetail()
  {
   return $this->hasMany(guruSertifikatDetail::class,'guruSertifikatMaster_id','id');
  }

  
}
