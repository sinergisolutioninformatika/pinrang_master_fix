<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class masalahsosialDetail extends Model
{
  protected $fillable = ['id',
                         'masalahsosialMaster_id',
                         'masalahsosial_id',
                         'jmlMasalah'];

  protected $table = 'masalahsosialDetails';
  public function masalahsosialMaster()
  {
    $this->belongsTo(masalahsosialMaster::class);
  }

  public function namamasalahsos(){
    return $this->belongsTo('App\Models\Sosial\masalahsosial', 'masalahsosial_id','id');
  }
}
