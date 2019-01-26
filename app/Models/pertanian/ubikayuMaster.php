<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class ubikayuMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalTanam',
                         'totalPanen',
                         'totalProduksi',
                         'totalProduktivitas'];
  protected $table = 'ubikayuMasters';
  public function ubikayuDetail()
  {
     return $this->hasMany(ubikayuDetail::class,'ubikayuMaster_id', 'id');
  }
}
