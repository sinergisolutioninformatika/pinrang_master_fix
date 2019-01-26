<?php

namespace App\Models\nakertrans;

use Illuminate\Database\Eloquent\Model;

class nakerMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPerusahaan',
                         'totalNaker',
                         'totalNakerlaki',
                         'totalNakerperempuan'];
  protected $table = 'nakerMasters';
  public function nakerDetail()
  {
    $this->hasMany(nakerDetail::class);
  }
}
