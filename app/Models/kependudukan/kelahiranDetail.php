<?php

namespace App\Models\kependudukan;

use Illuminate\Database\Eloquent\Model;

class kelahiranDetail extends Model
{
  protected $table = 'kelahiranDetails';
  protected $fillable = ['id','kelahiranMaster_id','kecamatan_id','jmlKelahiran','jmlKematian'];

  public function kelahiranMaster()
  {
    $this->belongsTo(kelahiranMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id','id');
  }
}
