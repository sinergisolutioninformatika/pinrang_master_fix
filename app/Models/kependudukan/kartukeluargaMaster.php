<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kartukeluargaMaster extends Model
{
  protected $table='kartukeluargaMasters';

  protected $fillable = ['id','ta','bln','totalKK','totalMilikiKK'];

  public function kartukeluargaDetail()
  {
    return $this->hasMany(kartukeluargaDetail::class,'kartukeluargaMaster_id','id');
  }
}
