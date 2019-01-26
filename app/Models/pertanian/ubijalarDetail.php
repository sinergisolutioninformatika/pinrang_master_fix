<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class ubijalarDetail extends Model
{
  protected $fillable = ['id',
                         'ubijalarMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'ubijalarDetails';
  public function ubijalarMaster()
  {
    $this->belongsTo(ubijalarMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
