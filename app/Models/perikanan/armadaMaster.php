<?php

namespace App\Models\perikanan;

use Illuminate\Database\Eloquent\Model;

class armadaMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalArmada',
                         'totalKapalmotor',
                         'totalPerahumotor',
                         'totalPerahutanpamotor'];
  protected $table = 'armadaMasters';
  public function armadaDetail()
  {
    return $this->hasMany(armadaDetail::class,'armadaMaster_id', 'id');
  }
}
