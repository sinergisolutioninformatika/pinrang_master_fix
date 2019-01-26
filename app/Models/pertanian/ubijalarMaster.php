<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class ubijalarMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'ubijalarMasters';
  public function ubijalarDetail()
  {
    return $this->hasMany(ubijalarDetail::class,'ubijalarMaster_id','id');
  }
}
