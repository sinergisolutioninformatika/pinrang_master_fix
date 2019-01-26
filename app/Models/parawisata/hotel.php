<?php

namespace App\Models\parawisata;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlWisma',
                         'jmlHotel',
                         'jmlMelati1',
                         'jmlMelati2',
                         'jmlMelati3'];
}
