<?php

namespace App\Models\perpusarsip;

use Illuminate\Database\Eloquent\Model;

class kunjunganDetail extends Model
{
  protected $fillable = ['id',
                         'kunjunganMaster_id',
                         'lokasiperpustakaan_id',
                         'jmlKunjungan',
                         'jmlLaki',
                         'jmlPerempuan'
                       ];

  protected $table = 'kunjunganDetails';
  public function kunjunganMaster()
  {
    $this->belongsTo(kunjunganMaster::class);
  }

  public function lokasiperpustakaan(){
    return $this->belongsTo('App\Models\perpusarsip\lokasiperpustakaan','lokasiperpustakaan_id','id');
  }
}
