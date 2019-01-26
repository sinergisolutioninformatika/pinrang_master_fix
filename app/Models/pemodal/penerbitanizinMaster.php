<?php

namespace App\Models\pemodal;

use Illuminate\Database\Eloquent\Model;

class penerbitanizinMaster extends Model
{
  protected $table='penerbitanizinMasters';

  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'totalPenerbitan',
                         'totalRetribusi'];

  public function penerbitanizinDetail()
  {
    return $this->hasMany(penerbitanizinDetail::class,'penerbitanizinMaster_id','id');
  }
}
