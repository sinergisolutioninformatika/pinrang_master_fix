<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class masalahsosialMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'totalMasalah'];
  protected $table = 'masalahsosialMasters';
  public function masalahsosialDetail()
  {
    return $this->hasMany(masalahsosialDetail::class,'masalahsosialMaster_id','id');
  }
}
