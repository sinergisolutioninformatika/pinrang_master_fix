<?php

namespace App\Models\ppkb;

use Illuminate\Database\Eloquent\Model;

class kbaktifDetail extends Model
{
  protected $fillable = ['id',
                        'kbaktifMaster_id',
                        'kecamatan_id',
                        'jmlPPMKab',
                        'jmlPPMProv',
                        'jmlPPMPusat',
                        'jmlIUD',
                        'jmlMOP',
                        'jmlMOW',
                        'jmlIMP',
                        'jmlSTK',
                        'jmlPIL',
                        'jmlKDM'];

  protected $table = 'kbaktifDetails';
  public function kbaktifMaster()
  {
    $this->belongsTo(kbaktifMaster::class);
  }
  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
  }
}
