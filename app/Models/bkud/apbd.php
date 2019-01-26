<?php

namespace App\Models\bkud;

use Illuminate\Database\Eloquent\Model;

class apbd extends Model
{
  protected $fillable = ['id',
                         'ta',
                         'jmlPendapatan',
                         'jmlPAD',
                         'jmlDanaperimbangan',
                         'jmlPendapatanlain',
                         'jmlBelanja',
                         'jmlBelanjatidaklangsung',
                         'jmlBelanjalangsung',
                         'jmlPembiayaan',
                         'jmlPembiayaanpenerimaan',
                         'jmlPembiayaanpengeluaran',
                         'jmlSilpa'];
}
