<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class saranakeamanan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlSarana',
                         'jmlPoskeamanan',
                         'jmlPoskamling'];
}
