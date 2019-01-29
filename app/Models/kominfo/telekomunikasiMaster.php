<?php

namespace App\Models\kominfo;

use Illuminate\Database\Eloquent\Model;

class telekomunikasiMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalDesaterlayani',
                         'totalDesabelumterlayani',
                         'totalBTS'];
  protected $table = 'telekomunikasiMasters';
  public function telekomunikasiDetail()
  {
     return  $this->hasMany(telekomunikasiDetail::class,'telekomunikasiMaster_id','id');
  }
}
