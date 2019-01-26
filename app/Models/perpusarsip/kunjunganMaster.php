<?php

namespace App\Models\perpusarsip;

use Illuminate\Database\Eloquent\Model;

class kunjunganMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalKunjungan',
                         'totalLaki',
                         'totalPerempuan'
                       ];
   protected $table = 'kunjunganMasters';
   public function kunjunganDetail()
   {
    return $this->hasMany('App\Models\perpusarsip\kunjunganDetail','kunjunganMaster_id','id');
   }
}
