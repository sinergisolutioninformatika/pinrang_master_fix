<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\walidata;
use Auth;

class skpd extends Model
{
    protected $table='skpd';

    public function walidata()
    {
        // return $this->hasMany(walidata::class,'');
    }

    public function pengguna()
    {
        return $this->hasMany(User::class);
    }
}
