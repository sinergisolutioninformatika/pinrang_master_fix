<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class unjukrasa extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKasus',
                         'jmlPolitik',
                         'jmlEkonomi',
                         'jmlAgama',
                         'jmlLainnya'];
}
