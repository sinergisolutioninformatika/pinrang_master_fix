<?php

namespace App\Models\kesehatan;

use Illuminate\Database\Eloquent\Model;

class jamkesDetail extends Model
{
  protected $fillable = ['id',
                         'jamkesMaster_id',
                         'puskesmas_id',
                         'jmlPeserta',
                         'jmlLaki',
                         'jmlPerempuan'];

  protected $table = 'jamkesDetails';
  public function jamkesMaster()
  {
    $this->belongsTo(jamkesMaster::class);
  }

  public function puskesmas(){
    return $this->belongsTo('App\Puskesmas','puskesmas_id','id');
  }
}
