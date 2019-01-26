<?php

namespace App\Models\kesehatan;

use Illuminate\Database\Eloquent\Model;

class jamkesMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'totalPeserta',
                         'totalLaki',
                         'totalPerempuan'];
  protected $table = 'jamkesMasters';
  public function jamkesDetail()
  {
    return $this->hasMany(jamkesDetail::class,'jamkesMaster_id','id');
  }
}
