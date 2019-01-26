<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kawinMaster extends Model
{
  protected $table='kawinMasters';

  protected $fillable = ['id','ta','bln','totalKawin','totalCerai'];

  public function kawinDetail()
  {
    return $this->hasMany(kawinDetail::class,'kawinMaster_id','id');
  }
}
