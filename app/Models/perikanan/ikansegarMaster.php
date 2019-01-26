<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class ikansegarMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalProduksi',
                         'totalTambak',
                         'totalKolam',
                         'totalSawah'];
  protected $table = 'ikansegarMasters';
  public function ikansegarDetail()
  {
    return  $this->hasMany(ikansegarDetail::class,'ikansegarMaster_id','id');
  }
}
