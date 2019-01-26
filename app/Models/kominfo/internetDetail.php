<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class internetDetail extends Model
{
  protected $fillable = ['id',
                         'internetMaster_id',
                         'kecamatan_id',
                         'jmlDesaterlayani',
                         'jmlDesabelumterlayani'];

  protected $table = 'internetDetails';

  public function internetMaster()
  {
    $this->belongsTo(internetMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
