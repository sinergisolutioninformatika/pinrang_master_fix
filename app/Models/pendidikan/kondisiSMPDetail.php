<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiSMPDetail extends Model
{
  protected $table='kondisiSMPDetails';

  protected $fillable = ['id','kondisiSMPMaster_id', 'kecamatan_id','jmlSMP','jmlKondisiBaik','jmlRusakRingan','jmlRusakBerat'];

  public function kondisiSMPMaster()
  {
    $this->belongsTo(kondisiSMPMaster::class);
  }


  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
