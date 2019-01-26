<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiPAUDDetail extends Model
{
  protected $table='kondisiPAUDDetails';

  protected $fillable = ['id','kondisiPAUDMaster_id', 'kecamatan_id','jmlPAUD','jmlKondisiBaik','jmlRusakRingan','jmlRusakBerat'];

  public function kondisiPAUDMaster()
  {
    $this->belongsTo(kondisiPAUDMaster::class);
  }

  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
