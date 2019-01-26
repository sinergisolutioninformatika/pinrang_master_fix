<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class pertikaian extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKasus',
                         'jmlEtnis',
                         'jmlDesa',
                         'jmlAgama',
                         'jmlSimpatisan',
                         'jmlPelajar'];
}
