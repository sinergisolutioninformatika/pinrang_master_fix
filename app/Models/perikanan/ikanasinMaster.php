<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class ikanasinMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalProduksi',
                         'totalLaut',
                         'totalDarat'];
  protected $table = 'ikanasinMasters';
  public function ikanasinDetail()
  {
     return $this->hasMany(ikanasinDetail::class,'ikanasinMaster_id','id');
  }
}
