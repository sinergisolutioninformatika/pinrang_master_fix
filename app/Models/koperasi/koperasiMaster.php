<?php

namespace App\Models\koperasi;

use Illuminate\Database\Eloquent\Model;

class koperasiMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalKoperasi',
                         'totalAktif',
                         'totalTidakaktif'];
  protected $table = 'koperasiMasters';
  public function koperasiDetail()
  {
    return $this->hasMany(koperasiDetail::class,'koperasiMaster_id', 'id');
  }
}
