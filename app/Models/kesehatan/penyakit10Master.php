<?php

namespace App\Models\kesehatan;

use Illuminate\Database\Eloquent\Model;

class penyakit10Master extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'puskesmas_id',
                         'totalKasus',
                         'totalRawatJalan',
                         'totalRawatInap'];
  protected $table = 'penyakit10Masters';
  public function penyakit10Detail()
  {
    $this->hasMany(penyakit10Detail::class);
  }
}
