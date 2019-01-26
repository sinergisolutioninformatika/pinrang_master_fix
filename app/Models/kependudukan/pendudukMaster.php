<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class pendudukMaster extends Model
{
  protected $table='pendudukMasters';

  protected $fillable = ['id','ta','bln','totalPenduduk','totalPendLaki','totalPendPerempuan','totalWKTP','totalWKTPLaki','totalWKTPPerempuan','totalCetak'];

  public function pendudukDetail()
  {
   return $this->hasMany(pendudukDetail::class, 'pendudukMaster_id', 'id');
  }
}
