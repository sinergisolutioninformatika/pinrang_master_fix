<?php

namespace App\Models\psda;

use Illuminate\Database\Eloquent\Model;

class irigasiMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTersier',
                         'totalSekunder',
                         'totalInduk',
                         'totalKuarter'];
  protected $table = 'irigasiMasters';
  public function irigasiDetail()
  {
    return $this->hasMany('App\Models\psda\irigasiDetail','irigasiMaster_id','id');
  }
}
