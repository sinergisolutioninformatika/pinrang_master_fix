<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakSapiperah;
use View;

class ternakSapiperahController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakSapiperah::orderBy('ta','desc')->get();
     $dataChart = ternakSapiperah::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapiperah/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakSapiperah::orderBy('ta','desc')->get();
     $dataChart = ternakSapiperah::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapiperah/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakSapiperah::create([
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
      return redirect('/peternakan/ternakSapiperah');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakSapiperah::orderBy('ta','desc')->get();
     $dataEdit = ternakSapiperah::where('id','=',$kodeEdit)->get();
     $dataChart = ternakSapiperah::orderBy('ta','asc')->get();
     return view('/peternakan/ternakSapiperah/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakSapiperahMaster = ternakSapiperah::find($id);
     $update_ternakSapiperahMaster->Populasi=$request->Populasi;
     $update_ternakSapiperahMaster->Kematian=$request->Kematian;
     $update_ternakSapiperahMaster->Kelahiran=$request->Kelahiran;
     $update_ternakSapiperahMaster->Masuk=$request->Masuk;
     $update_ternakSapiperahMaster->Keluar=$request->Keluar;
     $update_ternakSapiperahMaster->RPH=$request->RPH;
     $update_ternakSapiperahMaster->NonRPH=$request->NonRPH;
     $update_ternakSapiperahMaster->jmlPotong=$request->jmlPotong;
     $update_ternakSapiperahMaster->save();

     return redirect('/peternakan/ternakSapiperah');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakSapiperah::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakSapiperah');
    }
}
