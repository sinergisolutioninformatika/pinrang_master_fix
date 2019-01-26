<?php

namespace App\Models\psda;

use Illuminate\Database\Eloquent\Model;

class luassawahMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPetak',
                         'totalLuas'];
  protected $table = 'luassawahMasters';
  public function luassawahDetail()
  {
    return $this->hasMany('App\Models\psda\luassawahDetail','luassawahMaster_id','id');
  }
}
