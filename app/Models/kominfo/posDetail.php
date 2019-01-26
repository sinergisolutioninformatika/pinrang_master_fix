<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class posDetail extends Model
{
  protected $fillable = ['id',
                         'posMaster_id',
                         'kecamatan_id',
                         'jmlPos',
                         'jmlPospembantu',
                         'jmlDesaterlayani'];

  protected $table = 'posDetails';

  public function posMaster()
  {
    $this->belongsTo(posMaster::class);
  }

  public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
