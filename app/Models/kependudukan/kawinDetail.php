<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kawinDetail extends Model
{
  protected $table = 'kawinDetails';
  protected $fillable = ['id','kawinMaster_id','kecamatan_id','jmlKawin','jmlCerai'];

  public function kawinMaster()
  {
    $this->belongsTo(kawinMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
