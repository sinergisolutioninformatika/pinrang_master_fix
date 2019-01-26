<?php

namespace App\Models\lingkungan;

use Illuminate\Database\Eloquent\Model;

class spplMaster extends Model
{
  protected $table='spplMasters';

  protected $fillable = ['id','ta','bln','totalSurat'];

  public function spplDetail()
  {
    return $this->hasMany(spplDetail::class,'spplMaster_id','id');
  }
}
