<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class pendudukDetail extends Model
{
  protected $table = 'pendudukDetails';
  protected $fillable = ['id','pendudukMaster_id','kecamatan_id','jmlPenduduk','jmlPendLaki','jmlPendPerempuan','jmlWKTP','jmlWKTPLaki','jmlWKTPPerempuan','jmlCetak'];

  public function pendudukMaster()
  {
    $this->belongsTo(pendudukMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
