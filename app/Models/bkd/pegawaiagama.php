<?php

namespace App\Models\bkd;

use Illuminate\Database\Eloquent\Model;

class pegawaiagama extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlIslam',
                         'jmlKatolik',
                         'jmlProtestan',
                         'jmlBudha',
                         'jmlHindu'];
}
