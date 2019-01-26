<?php

namespace App\Models\bkd;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPegawai',
                         'totalLaki',
                         'totalPerempuan'];
}
