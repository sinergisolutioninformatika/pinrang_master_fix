<?php

namespace App\Models\bkd;

use Illuminate\Database\Eloquent\Model;

class eselon extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'totalPejabat',
                         'eselonIIa',
                         'eselonIIb',
                         'eselonIIIa',
                         'eselonIIIb',
                         'eselonIVa',
                         'eselonIVb',
                         'eselonV'];
}
