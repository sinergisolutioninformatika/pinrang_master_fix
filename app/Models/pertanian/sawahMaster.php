<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class sawahMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalLuas'];
  protected $table = 'sawahMasters';
  public function sawahDetail()
  {
    return $this->hasMany(sawahDetail::class,'sawahMaster_id','id');
  }
}
