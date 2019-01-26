<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class ikanasinDetail extends Model
{
  protected $fillable = ['id',
                         'ikanasinMaster_id',
                         'kecamatan_id',
                         'jmlProduksi',
                         'jmlLaut',
                         'jmlDarat'];

  protected $table = 'ikanasinDetails';
  public function ikanasinMaster()
  {
    $this->belongsTo(ikanasinMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id', 'id');
  }
}
