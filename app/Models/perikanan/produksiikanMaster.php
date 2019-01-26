<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class produksiikanMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalProduksi',
                         'totalLaut',
                         'totalRawa',
                         'totalSungai',
                         'totalWaduk'];
  protected $table = 'produksiikanMasters';
  public function produksiikanDetail()
  {
     return $this->hasMany(produksiikanDetail::class,'produksiikanMaster_id', 'id');
  }
}
