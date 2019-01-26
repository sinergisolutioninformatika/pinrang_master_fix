<?php

namespace App\Models\lingkungan;

use Illuminate\Database\Eloquent\Model;

class spplDetail extends Model
{
  protected $table = 'spplDetails';
  protected $fillable = ['id','spplMaster_id','kecamatan_id','jmlSurat'];

  public function spplMaster()
  {
    $this->belongsTo(spplMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
