<?php

namespace App\Models\perkebunan;

use Illuminate\Database\Eloquent\Model;

class kebunCengkeh extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'Areal',
                         'Petani',
                         'Produksi',
                         'Produktivitas'];
}
