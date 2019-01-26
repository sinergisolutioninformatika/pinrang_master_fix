<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class padiDetail extends Model
{
  protected $fillable = ['id',
                         'padiMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'padiDetails';
  public function padiMaster()
  {
    return $this->belongsTo(padiMaster::class);
  }

  public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
