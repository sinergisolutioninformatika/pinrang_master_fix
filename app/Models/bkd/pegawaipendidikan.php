<?php

namespace App\Models\bkd;

use Illuminate\Database\Eloquent\Model;

class pegawaipendidikan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlSD',
                         'jmlSMP',
                         'jmlSMA',
                         'jmlD1',
                         'jmlD2',
                         'jmlD3',
                         'jmlS1',
                         'jmlS2',
                         'jmlS3'];
}
