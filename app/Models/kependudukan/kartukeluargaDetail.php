<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kartukeluargaDetail extends Model
{
  protected $table = 'kartukeluargaDetails';
  protected $fillable = ['id','kartukeluargaMaster_id','kecamatan_id','jmlKK','jmlMilikiKK'];

  public function kartukeluargaMaster()
  {
    $this->belongsTo(kartukeluargaMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id','id');
  }
}
