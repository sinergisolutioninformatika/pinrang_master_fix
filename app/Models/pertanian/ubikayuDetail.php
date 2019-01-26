<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class ubikayuDetail extends Model
{
  protected $fillable = ['id',
                         'ubikayuMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'ubikayuDetails';
  public function ubikayuMaster()
  {
    $this->belongsTo(ubikayuMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id', 'id');
  }
}
