<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class produksiikanDetail extends Model
{
  protected $fillable = ['id',
                         'produksiikanMaster_id',
                         'kecamatan_id',
                         'jmlProduksi',
                         'jmlLaut',
                         'jmlRawa',
                         'jmlSungai',
                         'jmlWaduk'];

  protected $table = 'produksiikanDetails';
  public function produksiikanMaster()
  {
    $this->belongsTo(produksiikanMaster::class);
  }
   public function kecamatan(){
     return $this->belongsTo('App\Kecamatan', 'kecamatan_id','id');
   }
}
