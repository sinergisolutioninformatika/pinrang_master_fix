<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class armadaDetail extends Model
{
  protected $fillable = ['id',
                         'armadaMaster_id',
                         'kecamatan_id',
                         'jmlArmada',
                         'jmlKapalmotor',
                         'jmlPerahumotor',
                         'jmlPerahutanpamotor'];

  protected $table = 'armadaDetails';
  public function armadaMaster()
  {
    $this->belongsTo(armadaMaster::class);
  }
  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
