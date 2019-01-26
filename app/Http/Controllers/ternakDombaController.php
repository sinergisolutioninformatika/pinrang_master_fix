<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakDomba;
use View;

class ternakDombaController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakDomba::orderBy('ta','desc')->get();
     $dataChart = ternakDomba::orderBy('ta','asc')->get();
     return view('/peternakan/ternakDomba/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakDomba::orderBy('ta','desc')->get();
     $dataChart = ternakDomba::orderBy('ta','asc')->get();
     return view('/peternakan/ternakDomba/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakDomba::create([
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
      return redirect('/peternakan/ternakDomba');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakDomba::orderBy('ta','desc')->get();
     $dataEdit = ternakDomba::where('id','=',$kodeEdit)->get();
     $dataChart = ternakDomba::orderBy('ta','asc')->get();
     return view('/peternakan/ternakDomba/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakDombaMaster = ternakDomba::find($id);
     $update_ternakDombaMaster->Populasi=$request->Populasi;
     $update_ternakDombaMaster->Kematian=$request->Kematian;
     $update_ternakDombaMaster->Kelahiran=$request->Kelahiran;
     $update_ternakDombaMaster->Masuk=$request->Masuk;
     $update_ternakDombaMaster->Keluar=$request->Keluar;
     $update_ternakDombaMaster->RPH=$request->RPH;
     $update_ternakDombaMaster->NonRPH=$request->NonRPH;
     $update_ternakDombaMaster->jmlPotong=$request->jmlPotong;
     $update_ternakDombaMaster->save();

     return redirect('/peternakan/ternakDomba');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakDomba::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakDomba');
    }
}
