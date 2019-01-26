<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class korbanpertikaian extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKorban',
                         'jmlMeninggal',
                         'jmlLuka'];
}
