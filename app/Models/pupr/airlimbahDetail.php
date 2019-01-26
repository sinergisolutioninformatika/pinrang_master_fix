<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class airlimbahDetail extends Model
{
  protected $fillable = ['id',
                         'airlimbahMaster_id',
                         'kecamatan_id',
                         'jmlUnit'];

  protected $table = 'airlimbahDetails';

  public function airlimbahMaster()
  {
    $this->belongsTo(airlimbahMaster::class);
  }
   public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
   }
}
