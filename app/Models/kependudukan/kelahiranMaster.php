<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kelahiranMaster extends Model
{
  protected $table='kelahiranMasters';

  protected $fillable = ['id','ta','bln','totalKelahiran','totalKematian'];

  public function kelahiranDetail()
  {
    return $this->hasMany(kelahiranDetail::class,'kelahiranMaster_id','id');
  }
}
