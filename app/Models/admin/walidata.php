<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class walidata extends Model
{
  protected $table = 'walidata';
  protected $fillable = ['id','skpd_id',
                            'nmaData',
                            'kategori_id',
                            'keterangan',
                            'link_view',
                            'link_admin',
                            'tag',
                            'created_at',
                            'updated_at'];
  public function skpd()
  {
    return $this->belongsTo(skpd::class);
  }
}
