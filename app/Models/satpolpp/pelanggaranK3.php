<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class pelanggaranK3 extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKasus'];
  protected $table = 'pelanggaranK3';
}
