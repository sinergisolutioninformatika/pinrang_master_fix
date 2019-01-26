<?php

namespace App\Models\peternakan;

use Illuminate\Database\Eloquent\Model;

class ternakItik extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'Populasi',
                         'Kematian',
                         'Kelahiran',
                         'Masuk',
                         'Keluar',
                         'RPH',
                         'NonRPH',
                         'jmlPotong'];
}
