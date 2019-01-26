<?php

namespace App\Models\perhubungan;

use Illuminate\Database\Eloquent\Model;

class ujikendaraan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKendaraan',
                         'Mobilpenumpang',
                         'Mobilbarang',
                         'Mobilkhusus',
                         'Keretagandeng',
                         'Keretatempelan'];
}
