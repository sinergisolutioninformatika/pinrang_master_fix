<?php

namespace App\Models\bpbd;

use Illuminate\Database\Eloquent\Model;

class bencanaalamDetail extends Model
{
  protected $fillable = ['id',
                         'bencanaalamMaster_id',
                         'kecamatan_id',
                         'jmlKejadian',
                         'jmlBanjir',
                         'jmlKebakaran',
                         'jmlKekeringan',
                         'jmlAnginkencang',
                         'jmlTanahlongsor'];

  protected $table = 'bencanaalamDetails';

  public function bencanaalamMaster()
  {
    $this->belongsTo(bencanaalamMaster::class);
  }

  public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan','kecamatan_id','id');
  }
}
