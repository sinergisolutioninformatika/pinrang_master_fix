<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class posMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPos',
                         'totalPospembantu',
                         'totalDesaterlayani'];
  protected $table = 'posMasters';
  public function posDetail()
  {
    return $this->hasMany(posDetail::class,'posMaster_id','id');
  }
}
