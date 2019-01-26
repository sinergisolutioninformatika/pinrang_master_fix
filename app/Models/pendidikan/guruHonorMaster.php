<?php

namespace App\Models\pendidikan;

use Illuminate\Database\Eloquent\Model;

class guruHonorMaster extends Model
{
  protected $table='guruHonorMasters';

  protected $fillable = ['id','ta','totalGuruHonor','totalGuruTKHonor','totalGuruSDHonor','totalGuruSMPHonor'];

  public function guruHonorDetail()
  {
    return $this->hasMany(guruHonorDetail::class,'guruHonorMaster_id', 'id');
  }


}
