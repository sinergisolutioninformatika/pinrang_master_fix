<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class ikansegarDetail extends Model
{
  protected $fillable = ['id',
                         'ikansegarMaster_id',
                         'kecamatan_id',
                         'jmlProduksi',
                         'jmlTambak',
                         'jmlKolam',
                         'jmlSawah'];

  protected $table = 'ikansegarDetails';
  public function ikansegarMaster()
  {
    $this->belongsTo(ikansegarMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
