<?php

namespace App\Models\Sosial;

use Illuminate\Database\Eloquent\Model;

class bencanaDetail extends Model
{
  protected $fillable = ['id',
                         'bencanaMaster_id',
                         'bencana_id',
                         'jmlKejadian'];

  protected $table = 'bencanaDetails';
  public function bencanaMaster()
  {
    $this->belongsTo(bencanaMaster::class);
  }

  public function bencana()
  {
  	return $this->belongsTo('App\Models\Sosial\bencana','bencana_id','id');
  }
}
