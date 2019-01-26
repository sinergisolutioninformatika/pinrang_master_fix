<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class nelayanDetail extends Model
{
  protected $fillable = ['id',
                         'nelayanMaster_id',
                         'kecamatan_id',
                         'jmlNelayan',
                         'jmlNelayanlaut',
                         'jmlNelayandarat',
                         'jmlPetanisawah',
                         'jmlPetanikolam',
                         'jmlPetanitambak'];

  protected $table = 'nelayanDetails';
  public function nelayanMaster()
  {
    $this->belongsTo(nelayanMaster::class);
  }
  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  } 
}
