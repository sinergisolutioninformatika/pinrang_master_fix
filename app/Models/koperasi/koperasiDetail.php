<?php

namespace App\Models\koperasi;

use Illuminate\Database\Eloquent\Model;

class koperasiDetail extends Model
{
  protected $fillable = ['id',
                         'koperasiMaster_id',
                         'koperasi_id',
                         'jmlKoperasi',
                         'jmlAktif',
                         'jmlTidakaktif'];

  protected $table = 'koperasiDetails';
  public function koperasiMaster()
  {
    $this->belongsTo(koperasiMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
