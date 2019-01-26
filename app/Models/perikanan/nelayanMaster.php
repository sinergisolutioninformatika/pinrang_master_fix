<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class nelayanMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalNelayan',
                         'totalNelayanlaut',
                         'totalNelayandarat',
                         'totalPetanisawah',
                         'totalPetanikolam',
                         'totalPetanitambak'];
  protected $table = 'nelayanMasters';
  public function nelayanDetail()
  {
    return $this->hasMany(nelayanDetail::class,'nelayanMaster_id','id');
  }
}
