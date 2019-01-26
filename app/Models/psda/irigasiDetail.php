<?php

namespace App\Models\psda;

use Illuminate\Database\Eloquent\Model;

class irigasiDetail extends Model
{
  protected $fillable = ['id',
                         'irigasiMaster_id',
                         'uptd_psda_id',
                         'jmlTersier',
                         'jmlSekunder',
                         'jmlInduk',
                         'jmlKuarter'];

  protected $table = 'irigasiDetails';
  public function irigasiMaster()
  {
    $this->belongsTo(irigasiMaster::class);
  }

  public function uptd()
  {
    return $this->belongsTo('App\Models\psda\uptd_psda','uptd_psda_id','id');
  }
}
