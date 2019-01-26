<?php

namespace App\Models\koperasi;

use Illuminate\Database\Eloquent\Model;

class perbankan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlBank',
                         'BUP',
                         'BPD',
                         'BSN',
                         'BAC',
                         'BPR'];
}
