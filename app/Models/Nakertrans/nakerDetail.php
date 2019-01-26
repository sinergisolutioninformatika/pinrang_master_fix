<?php

namespace App\Models\nakertrans;

use Illuminate\Database\Eloquent\Model;

class nakerDetail extends Model
{
  protected $fillable = ['id',
                         'nakerMaster_id',
                         'kecamatan_id',
                         'jmlPerusahaan',
                         'jmlNaker',
                         'jmlNakerlaki',
                         'jmlNakerperempuan'];

  protected $table = 'nakerDetails';
  public function nakerMaster()
  {
    $this->belongsTo(nakerMaster::class);
  }
}
