<?php

namespace App\Models\kesbangpol;

use Illuminate\Database\Eloquent\Model;

class lsm extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlLSM',
                         'jmlLokalterdaftar',
                         'jmlLokaltidakterdaftar',
                         'jmlNasionalterdaftar',
                         'jmlNasionaltidakterdaftar',
                         'jmlInterterdaftar',
                         'jmlIntertidakterdaftar'];
}
