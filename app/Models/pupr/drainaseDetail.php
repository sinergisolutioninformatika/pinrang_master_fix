<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class drainaseDetail extends Model
{
  protected $fillable = ['id',
                         'drainaseMaster_id',
                         'kecamatan_id',
                         'jmlVol'];

  protected $table = 'drainaseDetails';

  public function drainaseMaster()
  {
    $this->belongsTo(drainaseMaster::class);
  }

  public function kecamatan()
  {
  	return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
