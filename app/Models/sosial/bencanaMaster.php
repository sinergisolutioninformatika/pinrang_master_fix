<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class bencanaMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'totalKejadian'];
  protected $table = 'bencanaMasters';
  public function bencanaDetail()
  {
    return $this->hasMany('App\Models\Sosial\bencanaDetail','bencanaMaster_id','id');
  }
}
