<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakKuda;
use View;

class ternakKudaController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakKuda::orderBy('ta','desc')->get();
     $dataChart = ternakKuda::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKuda/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakKuda::orderBy('ta','desc')->get();
     $dataChart = ternakKuda::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKuda/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakKuda::create([
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
      return redirect('/peternakan/ternakKuda');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakKuda::orderBy('ta','desc')->get();
     $dataEdit = ternakKuda::where('id','=',$kodeEdit)->get();
     $dataChart = ternakKuda::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKuda/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakKudaMaster = ternakKuda::find($id);
     $update_ternakKudaMaster->Populasi=$request->Populasi;
     $update_ternakKudaMaster->Kematian=$request->Kematian;
     $update_ternakKudaMaster->Kelahiran=$request->Kelahiran;
     $update_ternakKudaMaster->Masuk=$request->Masuk;
     $update_ternakKudaMaster->Keluar=$request->Keluar;
     $update_ternakKudaMaster->RPH=$request->RPH;
     $update_ternakKudaMaster->NonRPH=$request->NonRPH;
     $update_ternakKudaMaster->jmlPotong=$request->jmlPotong;
     $update_ternakKudaMaster->save();

     return redirect('/peternakan/ternakKuda');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakKuda::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakKuda');
    }
}
