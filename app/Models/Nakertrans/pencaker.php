<?php

namespace App\Models\nakertrans;

use Illuminate\Database\Eloquent\Model;

class pencaker extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlPencaker',
                         'pencakerLaki',
                         'pencakerPerempuan',
                         'jmlDitempatkan',
                         'ditempatkanLaki',
                         'ditempatkanPerempuan'];
}
