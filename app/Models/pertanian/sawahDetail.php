<?php

namespace App\Models\pertanian;

use Illuminate\Database\Eloquent\Model;

class sawahDetail extends Model
{
  protected $fillable = ['id',
                         'sawahMaster_id',
                         'kecamatan_id',
                         'jmlLuas'];

  protected $table = 'sawahDetails';
  public function sawahMaster()
  {
    $this->belongsTo(sawahMaster::class,'sawahMaster_id','id');
  }

  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
