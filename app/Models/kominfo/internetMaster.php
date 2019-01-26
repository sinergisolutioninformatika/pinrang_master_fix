<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class internetMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalDesaterlayani',
                         'totalDesabelumterlayani'];
  protected $table = 'internetMasters';
  public function internetDetail()
  {
    return $this->hasMany(internetDetail::class,'internetMaster_id','id');
  }
}
