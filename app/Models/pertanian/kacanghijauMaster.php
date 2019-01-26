<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kacanghijauMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'kacanghijauMasters';
  public function kacanghijauDetail()
  {
    return $this->hasMany(kacanghijauDetail::class,'kacanghijauMaster_id','id');
  }
}
