<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kacangtanahMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'kacangtanahMasters';
  public function kacangtanahDetail()
  {
    return $this->hasMany(kacangtanahDetail::class,'kacangtanahMaster_id', 'id');
  }
}
