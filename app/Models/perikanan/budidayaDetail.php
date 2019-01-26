<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class budidayaDetail extends Model
{
  protected $fillable = ['id',
                         'budidayaMaster_id',
                         'kecamatan_id',
                         'jmlUsaha',
                         'jmlTambak',
                         'jmlKolam',
                         'jmlSawah'];

  protected $table = 'budidayaDetails';
  public function budidayaMaster()
  {
    $this->belongsTo(budidayaMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
