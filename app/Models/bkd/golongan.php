<?php

namespace App\Models\bkd;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalGol',
                         'golI',
                         'golII',
                         'golIII',
                         'golIV'];
}
