<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakItik;
use View;

class ternakItikController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakItik::orderBy('ta','desc')->get();
     $dataChart = ternakItik::orderBy('ta','asc')->get();
     return view('/peternakan/ternakItik/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakItik::orderBy('ta','desc')->get();
     $dataChart = ternakItik::orderBy('ta','asc')->get();
     return view('/peternakan/ternakItik/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakItik::create([
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
      return redirect('/peternakan/ternakItik');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakItik::orderBy('ta','desc')->get();
     $dataEdit = ternakItik::where('id','=',$kodeEdit)->get();
     $dataChart = ternakItik::orderBy('ta','asc')->get();
     return view('/peternakan/ternakItik/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakItikMaster = ternakItik::find($id);
     $update_ternakItikMaster->Populasi=$request->Populasi;
     $update_ternakItikMaster->Kematian=$request->Kematian;
     $update_ternakItikMaster->Kelahiran=$request->Kelahiran;
     $update_ternakItikMaster->Masuk=$request->Masuk;
     $update_ternakItikMaster->Keluar=$request->Keluar;
     $update_ternakItikMaster->RPH=$request->RPH;
     $update_ternakItikMaster->NonRPH=$request->NonRPH;
     $update_ternakItikMaster->jmlPotong=$request->jmlPotong;
     $update_ternakItikMaster->save();

     return redirect('/peternakan/ternakItik');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakItik::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakItik');
    }
}
