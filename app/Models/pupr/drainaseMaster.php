<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class drainaseMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalVol'];
  protected $table = 'drainaseMasters';
  public function drainaseDetail()
  {
    return $this->hasMany(drainaseDetail::class,'drainaseMaster_id','id');
  }
}
