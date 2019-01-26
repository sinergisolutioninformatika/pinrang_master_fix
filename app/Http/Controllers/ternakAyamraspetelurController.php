<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakAyamraspetelur;
use View;

class ternakAyamraspetelurController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakAyamraspetelur::orderBy('ta','desc')->get();
     $dataChart = ternakAyamraspetelur::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspetelur/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakAyamraspetelur::orderBy('ta','desc')->get();
     $dataChart = ternakAyamraspetelur::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspetelur/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakAyamraspetelur::create([
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
      return redirect('/peternakan/ternakAyamraspetelur');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakAyamraspetelur::orderBy('ta','desc')->get();
     $dataEdit = ternakAyamraspetelur::where('id','=',$kodeEdit)->get();
     $dataChart = ternakAyamraspetelur::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspetelur/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakAyamraspetelurMaster = ternakAyamraspetelur::find($id);
     $update_ternakAyamraspetelurMaster->Populasi=$request->Populasi;
     $update_ternakAyamraspetelurMaster->Kematian=$request->Kematian;
     $update_ternakAyamraspetelurMaster->Kelahiran=$request->Kelahiran;
     $update_ternakAyamraspetelurMaster->Masuk=$request->Masuk;
     $update_ternakAyamraspetelurMaster->Keluar=$request->Keluar;
     $update_ternakAyamraspetelurMaster->RPH=$request->RPH;
     $update_ternakAyamraspetelurMaster->NonRPH=$request->NonRPH;
     $update_ternakAyamraspetelurMaster->jmlPotong=$request->jmlPotong;
     $update_ternakAyamraspetelurMaster->save();

     return redirect('/peternakan/ternakAyamraspetelur');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakAyamraspetelur::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakAyamraspetelur');
    }
}
