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

  protected $table = 'koperasidetails';
  public function koperasiMaster()
  {
    $this->belongsTo(koperasiMaster::class);
  }

  public function koperasi(){
    return $this->belongsTo('App\Models\koperasi\daftar_koperasi', 'koperasi_id', 'id');
  }
}
