<?php

namespace App\Models\peternakan;

use Illuminate\Database\Eloquent\Model;

class ternakBabi extends Model
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
