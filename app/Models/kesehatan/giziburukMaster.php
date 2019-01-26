<?php

namespace App\Models\kesehatan;

use Illuminate\Database\Eloquent\Model;

class giziburukMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'bln',
                         'totalKasus',
                         'totalPerawatan'];
  protected $table = 'giziburukMasters';
  public function giziburukDetail()
  {
    return $this->hasMany(giziburukDetail::class, 'giziburukMaster_id','id');
  }
}
