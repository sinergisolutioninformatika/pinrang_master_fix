<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class kondisiTKDetail extends Model
{
  protected $table='kondisiTKDetails';

  protected $fillable = ['id','kondisiTKMaster_id', 'kecamatan_id','jmlTK','jmlKondisiBaik','jmlRusakRingan','jmlRusakBerat'];

  public function kondisiTKMaster()
  {
    $this->belongsTo(kondisiTKMaster::class);
  }

  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
