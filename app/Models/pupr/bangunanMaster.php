<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class bangunanMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalUnit'];
  protected $table = 'bangunanMasters';
  public function bangunanDetail()
  {
   return $this->hasMany(bangunanDetail::class,'bangunanMaster_id','id');
  }

 
}
