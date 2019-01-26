<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class pemukimanDetail extends Model
{
  protected $fillable = ['id',
                         'pemukimanMaster_id',
                         'kecamatan_id',
                         'jmlLuas'];

  protected $table = 'pemukimanDetails';

  public function pemukimanMaster()
  {
    $this->belongsTo(pemukimanMaster::class);
  }

  public function kecamatan(){
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
