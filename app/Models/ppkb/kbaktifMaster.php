<?php

namespace App\Models\ppkb;

use Illuminate\Database\Eloquent\Model;

class kbaktifMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPPMKab',
                         'totalPPMProv',
                         'totalPPMPusat',
                         'totalIUD',
                         'totalMOP',
                         'totalMOW',
                         'totalIMP',
                         'totalSTK',
                         'totalPIL',
                         'totalKDM'];
  protected $table = 'kbaktifMasters';
  public function kbaktifDetail()
  {
   return $this->hasMany(kbaktifDetail::class,'kbaktifMaster_id','id');
  }
}
