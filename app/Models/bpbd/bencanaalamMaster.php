<?php

namespace App\Models\bpbd;

use Illuminate\Database\Eloquent\Model;

class bencanaalamMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalKejadian',
                         'totalBanjir',
                         'totalKebakaran',
                         'totalKekeringan',
                         'totalAnginkencang',
                         'totalTanahlongsor'];
  protected $table = 'bencanaalamMasters';
  public function bencanaalamDetail()
  {
    return $this->hasMany(bencanaalamDetail::class,'bencanaalamMaster_id','id');
  }
}
