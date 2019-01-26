<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class padiMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'padiMasters';
  

  public function padiDetail()
  {
    return $this->hasMany('App\Models\pertanian\padiDetail','padiMaster_id','id');
  }
}
