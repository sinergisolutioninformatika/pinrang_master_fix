<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class pemukimanMaster extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalLuas'];
  protected $table = 'pemukimanMasters';
  public function pemukimanDetail()
  {
    return $this->hasMany(pemukimanDetail::class,'pemukimanMaster_id','id');
  }
}
