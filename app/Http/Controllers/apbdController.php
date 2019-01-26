<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkud\apbd;
use View;

class apbdController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = apbd::orderBy('ta','desc')->get();
    $dataChart = apbd::orderBy('ta','asc')->get();
    return view('/bkud/apbd/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = apbd::orderBy('ta','desc')->get();
     $dataChart = apbd::orderBy('ta','asc')->get();
     return view('/bkud/apbd/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = apbd::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlPendapatan' => $request->jmlPendapatan,
        'jmlPAD' => $request->jmlPAD,
        'jmlDanaperimbangan' => $request->jmlDanaperimbangan,
        'jmlPendapatanlain' => $request->jmlPendapatanlain,
        'jmlBelanja' => $request->jmlBelanja,
        'jmlBelanjatidaklangsung' => $request->jmlBelanjatidaklangsung,
        'jmlBelanjalangsung' => $request->jmlBelanjalangsung,
        'jmlPembiayaan' => $request->jmlPembiayaan,
        'jmlPembiayaanpenerimaan' => $request->jmlPembiayaanpenerimaan,
        'jmlPembiayaanpengeluaran' => $request->jmlPembiayaanpengeluaran,
        'jmlSilpa' => $request->jmlSilpa,
      ]);
      return redirect('/bkud/apbd');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = apbd::orderBy('ta','desc')->get();
     $dataEdit = apbd::where('id','=',$kodeEdit)->get();
     $dataChart = apbd::orderBy('ta','asc')->get();
     return view('/bkud/apbd/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_apbdMaster = apbd::find($id);
     $update_apbdMaster->jmlPendapatan=$request->jmlPendapatan;
     $update_apbdMaster->jmlPAD=$request->jmlPAD;
     $update_apbdMaster->jmlDanaperimbangan=$request->jmlDanaperimbangan;
     $update_apbdMaster->jmlPendapatanlain=$request->jmlPendapatanlain;
     $update_apbdMaster->jmlBelanja=$request->jmlBelanja;
     $update_apbdMaster->jmlBelanjatidaklangsung=$request->jmlBelanjatidaklangsung;
     $update_apbdMaster->jmlBelanjalangsung=$request->jmlBelanjalangsung;
     $update_apbdMaster->jmlPembiayaan=$request->jmlPembiayaan;
     $update_apbdMaster->jmlPembiayaanpenerimaan=$request->jmlPembiayaanpenerimaan;
     $update_apbdMaster->jmlPembiayaanpengeluaran=$request->jmlPembiayaanpengeluaran;
     $update_apbdMaster->jmlSilpa=$request->jmlSilpa;
     $update_apbdMaster->save();

     return redirect('/bkud/apbd');
   }
   public function destroy($xdj)
    {
      $cMaster = apbd::find($xdj);
      $cMaster->delete();
      return redirect('/bkud/apbd');
    }
}
