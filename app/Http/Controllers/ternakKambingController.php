<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakKambing;
use View;

class ternakKambingController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ternakKambing::orderBy('ta','desc')->get();
    $dataChart = ternakKambing::orderBy('ta','asc')->get();
    return view('/peternakan/ternakKambing/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakKambing::orderBy('ta','desc')->get();
     $dataChart = ternakKambing::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKambing/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakKambing::create([
        'ta' => session()->get('thn_anggaran'),
        'Populasi' => $request->Populasi,
        'Kematian' => $request->Kematian,
        'Kelahiran' => $request->Kelahiran,
        'Masuk' => $request->Masuk,
        'Keluar' => $request->Keluar,
        'RPH' => $request->RPH,
        'NonRPH' => $request->NonRPH,
        'jmlPotong' => $request->jmlPotong,
      ]);
      return redirect('/peternakan/ternakKambing');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakKambing::orderBy('ta','desc')->get();
     $dataEdit = ternakKambing::where('id','=',$kodeEdit)->get();
     $dataChart = ternakKambing::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKambing/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakKambingMaster = ternakKambing::find($id);
     $update_ternakKambingMaster->Populasi=$request->Populasi;
     $update_ternakKambingMaster->Kematian=$request->Kematian;
     $update_ternakKambingMaster->Kelahiran=$request->Kelahiran;
     $update_ternakKambingMaster->Masuk=$request->Masuk;
     $update_ternakKambingMaster->Keluar=$request->Keluar;
     $update_ternakKambingMaster->RPH=$request->RPH;
     $update_ternakKambingMaster->NonRPH=$request->NonRPH;
     $update_ternakKambingMaster->jmlPotong=$request->jmlPotong;
     $update_ternakKambingMaster->save();

     return redirect('/peternakan/ternakKambing');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakKambing::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakKambing');
    }
}
