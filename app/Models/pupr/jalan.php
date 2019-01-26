<?php

namespace App\Models\pupr;

use Illuminate\Database\Eloquent\Model;

class jalan extends Model
{
  protected $fillable = [
                         'ta',
                         'panjang',
                         'baik',
                         'sedang',
                         'rusakringan',
                         'rusakberat'];
}
