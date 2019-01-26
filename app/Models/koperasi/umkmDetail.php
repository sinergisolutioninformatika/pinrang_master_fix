<?php

namespace App\Models\koperasi;

use Illuminate\Database\Eloquent\Model;

class umkmDetail extends Model
{
  protected $fillable = ['id',
                         'umkmMaster_id',
                         'kecamatan_id',
                         'jmlUMKM',
                         'jmlPerdagangan',
                         'jmlIndustriPertanian',
                         'jmlIndustriNonPertanian',
                         'jmlAnekaJasa'];

  protected $table = 'umkmDetails';
  public function umkmMaster()
  {
    $this->belongsTo(umkmMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
