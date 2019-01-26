<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class jagungDetail extends Model
{
  protected $fillable = ['id',
                         'jagungMaster_id',
                         'kecamatan_id',
                         'jmlTanam',
                         'jmlPanen',
                         'jmlProduksi',
                         'jmlProduktivitas'];

  protected $table = 'jagungDetails';
  public function jagungMaster()
  {
    $this->belongsTo(jagungMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
