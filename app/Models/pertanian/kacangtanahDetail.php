<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class kacangtanahDetail extends Model
{
  protected $fillable = ['id',
                         'kacangtanahMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'kacangtanahDetails';
  public function kacangtanahMaster()
  {
    $this->belongsTo(kacangtanahMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
