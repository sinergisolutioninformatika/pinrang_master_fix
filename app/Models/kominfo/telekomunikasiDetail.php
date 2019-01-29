<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class telekomunikasiDetail extends Model
{
  protected $fillable = ['id',
                         'telekomunikasiMaster_id',
                         'kecamatan_id',
                         'jmlDesaterlayani',
                         'jmlDesabelumterlayani',
                         'jmlBTS'];

  protected $table = 'telekomunikasiDetails';

  public function telekomunikasiMaster()
  {
    $this->belongsTo(telekomunikasiMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
