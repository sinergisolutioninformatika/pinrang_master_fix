<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kedelaiMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'kedelaiMasters';
  public function kedelaiDetail()
  {
    return $this->hasMany(kedelaiDetail::class,'kedelaiMaster_id','id');
  }
}
