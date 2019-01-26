<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class airlimbahMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalUnit'];
  protected $table = 'airlimbahMasters';
  public function airlimbahDetail()
  {
   return $this->hasMany(airlimbahDetail::class,'airlimbahMaster_id', 'id');
  }
}
