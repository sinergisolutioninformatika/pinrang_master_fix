<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kedelaiDetail extends Model
{
  protected $fillable = ['id',
                         'kedelaiMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'kedelaiDetails';
  public function kedelaiMaster()
  {
    $this->belongsTo(kedelaiMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
