<?php

namespace App\Models\pemodal;

use Illuminate\Database\Eloquent\Model;

class penerbitanizinDetail extends Model
{
  protected $table = 'penerbitanizinDetails';
  protected $fillable = ['id',
                         'penerbitanizinMaster_id',
                         'bidang_izin_id',
                         'jmlPenerbitan',
                         'jmlRetribusi'];

  public function penerbitanizinMaster()
  {
    $this->belongsTo(penerbitanizinMaster::class);
  }

  public function bidanIzin()
  {
    return $this->belongsTo('App\Models\bidang_izin','bidang_izin_id','id');
  }
}
