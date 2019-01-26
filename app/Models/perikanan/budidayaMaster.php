<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class budidayaMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalUsaha',
                         'totalTambak',
                         'totalKolam',
                         'totalSawah'];
  protected $table = 'budidayaMasters';
  public function budidayaDetail()
  {
    return $this->hasMany(budidayaDetail::class,'budidayaMaster_id','id');

  }
}
