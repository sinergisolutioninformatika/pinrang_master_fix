<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakSapipotong;
use View;

class ternakSapipotongController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakSapipotong::orderBy('ta','desc')->get();
     $dataChart = ternakSapipotong::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapipotong/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakSapipotong::orderBy('ta','desc')->get();
     $dataChart = ternakSapipotong::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapipotong/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakSapipotong::create([
        'ta' =>session()->get('thn_anggaran'),
        'Populasi' => $request->Populasi,
        'Kematian' => $request->Kematian,
        'Kelahiran' => $request->Kelahiran,
        'Masuk' => $request->Masuk,
        'Keluar' => $request->Keluar,
        'RPH' => $request->RPH,
        'NonRPH' => $request->NonRPH,
        'jmlPotong' => $request->jmlPotong,
      ]);
      return redirect('/peternakan/ternakSapipotong');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakSapipotong::orderBy('ta','desc')->get();
     $dataEdit = ternakSapipotong::where('id','=',$kodeEdit)->get();
     $dataChart = ternakSapipotong::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapipotong/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakSapipotongMaster = ternakSapipotong::find($id);
     $update_ternakSapipotongMaster->Populasi=$request->Populasi;
     $update_ternakSapipotongMaster->Kematian=$request->Kematian;
     $update_ternakSapipotongMaster->Kelahiran=$request->Kelahiran;
     $update_ternakSapipotongMaster->Masuk=$request->Masuk;
     $update_ternakSapipotongMaster->Keluar=$request->Keluar;
     $update_ternakSapipotongMaster->RPH=$request->RPH;
     $update_ternakSapipotongMaster->NonRPH=$request->NonRPH;
     $update_ternakSapipotongMaster->jmlPotong=$request->jmlPotong;
     $update_ternakSapipotongMaster->save();

     return redirect('/peternakan/ternakSapipotong');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakSapipotong::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakSapipotong');
    }
}
