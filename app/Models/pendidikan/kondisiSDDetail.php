<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiSDDetail extends Model
{
  protected $table='kondisiSDDetails';

  protected $fillable = ['id','kondisiSDMaster_id', 'kecamatan_id','jmlSD','jmlKondisiBaik','jmlRusakRingan','jmlRusakBerat'];

  public function kondisiSDMaster()
  {
    $this->belongsTo(kondisiSDMaster::class);
  }

  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
