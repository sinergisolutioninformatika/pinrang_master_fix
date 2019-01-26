<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class jagungMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'jagungMasters';
  public function jagungDetail()
  {
    return $this->hasMany(jagungDetail::class,'jagungMaster_id', 'id');
  }
}
