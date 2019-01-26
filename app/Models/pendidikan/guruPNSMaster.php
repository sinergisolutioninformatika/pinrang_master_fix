<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruPNSMaster extends Model
{
  protected $table='guruPNSMasters';

  protected $fillable = ['id','ta','totalGuruPNS','totalGuruTKPNS','totalGuruSDPNS','totalGuruSMPPNS'];

  public function guruPNSDetail()
  {
   return $this->hasMany(guruPNSDetail::class,'guruPNSMaster_id','id');
  }
}
