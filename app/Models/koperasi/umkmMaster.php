<?php

namespace App\Models\koperasi;

use Illuminate\Database\Eloquent\Model;

class umkmMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalUMKM',
                         'totalPerdagangan',
                         'totalIndustriPertanian',
                         'totalIndustriNonPertanian',
                         'totalAnekaJasa'];
  protected $table = 'umkmMasters';
  public function umkmDetail()
  {
   return $this->hasMany(umkmDetail::class,'umkmMaster_id','id');
  }
}
