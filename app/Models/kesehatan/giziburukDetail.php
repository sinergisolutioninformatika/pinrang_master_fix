<?php

namespace App\Models\kesehatan; 

use Illuminate\Database\Eloquent\Model;

class giziburukDetail extends Model
{
  protected $fillable = ['id',
                         'giziburukMaster_id',
                         'puskesmas_id',
                         'jmlKasus',
                         'jmlPerawatan'];

  protected $table = 'giziburukDetails';
  public function giziburukMaster()
  {
    $this->belongsTo(giziburukMaster::class);
  }

  public function puskesmas(){
    return $this->belongsTo('App\Puskesmas','puskesmas_id','id');
  }
}
