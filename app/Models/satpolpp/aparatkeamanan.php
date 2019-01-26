<?php

namespace App\Models\satpolpp;

use Illuminate\Database\Eloquent\Model;

class aparatkeamanan extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlAparat',
                         'jmlSatpol',
                         'jmlLinmas',
                         'jmlPatroli'];
}
