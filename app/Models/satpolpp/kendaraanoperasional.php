<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class kendaraanoperasional extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlKendaraan',
                         'jmlRoda2',
                         'jmlRoda4'];
}
