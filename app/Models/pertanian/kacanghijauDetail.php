<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kacanghijauDetail extends Model
{
  protected $fillable = ['id',
                         'kacanghijauMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'kacanghijauDetails';
  public function kacanghijauMaster()
  {
    $this->belongsTo(kacanghijauMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
