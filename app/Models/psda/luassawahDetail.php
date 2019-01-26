<?php

namespace App\Models\psda;

use Illuminate\Database\Eloquent\Model;

class luassawahDetail extends Model
{
  protected $fillable = ['id',
                         'luassawahMaster_id',
                         'uptd_psda_id',
                         'jmlPetak',
                         'jmlLuas'];

  protected $table = 'luassawahDetails';
  public function luassawahMaster()
  {
    $this->belongsTo(luassawahMaster::class);
  }

  public function uptd()
  {
    return $this->belongsTo('App\Models\psda\uptd_psda','uptd_psda_id','id');
  }
}
