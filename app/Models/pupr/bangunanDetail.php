<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class bangunanDetail extends Model
{
  protected $fillable = ['id',
                         'bangunanMaster_id',
                         'kecamatan_id',
                         'jmlUnit'];

  protected $table = 'bangunanDetails';

  public function bangunanMaster()
  {
    $this->belongsTo(bangunanMaster::class);
  }
  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
