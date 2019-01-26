<?php

namespace App\Models\perhubungan;

use Illuminate\Database\Eloquent\Model;

class lakalantas extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKejadian',
                         'Meninggal',
                         'Lukaberat',
                         'Lukaringan'];
}
