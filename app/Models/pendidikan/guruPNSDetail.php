<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruPNSDetail extends Model
{
  protected $table='guruPNSDetails';

  protected $fillable = ['id','guruPNSMaster_id', 'kecamatan_id','jmlGuruPNS','jmlGuruTKPNS','jmlGuruSDPNS','jmlGuruSMPPNS'];

  public function guruPNSMaster()
  {
    $this->belongsTo(guruPNSMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
