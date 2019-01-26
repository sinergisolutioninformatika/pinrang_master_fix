<?php

namespace App\Models\kesehatan;

use Illuminate\Database\Eloquent\Model;

class penyakit10Detail extends Model
{
  protected $fillable = ['id',
                         'penyakit10Master_id',
                         'puskesmas_id',
                         'penyakit_id',
                         'jmlKasus',
                         'jmlRawatJalan',
                         'jmlRawatInap'];

  protected $table = 'penyakit10Details';
  public function penyakit10Master()
  {
    $this->belongsTo(penyakit10Master::class);
  }
}
