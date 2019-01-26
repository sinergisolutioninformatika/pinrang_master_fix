<?php

namespace App\Models\nakertrans;

use Illuminate\Database\Eloquent\Model;

class transmigrasi extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'Jumlah',
                         'Lakilaki',
                         'Perempuan'];
}
