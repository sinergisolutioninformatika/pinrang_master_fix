<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakBabi;
use View;

class ternakBabiController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakBabi::orderBy('ta','desc')->get();
     $dataChart = ternakBabi::orderBy('ta','asc')->get();
     return view('/peternakan/ternakBabi/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakBabi::orderBy('ta','desc')->get();
     $dataChart = ternakBabi::orderBy('ta','asc')->get();
     return view('/peternakan/ternakBabi/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakBabi::create([
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
      return redirect('/peternakan/ternakBabi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakBabi::orderBy('ta','desc')->get();
     $dataEdit = ternakBabi::where('id','=',$kodeEdit)->get();
     $dataChart = ternakBabi::orderBy('ta','asc')->get();
     return view('/peternakan/ternakBabi/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakBabiMaster = ternakBabi::find($id);
     $update_ternakBabiMaster->Populasi=$request->Populasi;
     $update_ternakBabiMaster->Kematian=$request->Kematian;
     $update_ternakBabiMaster->Kelahiran=$request->Kelahiran;
     $update_ternakBabiMaster->Masuk=$request->Masuk;
     $update_ternakBabiMaster->Keluar=$request->Keluar;
     $update_ternakBabiMaster->RPH=$request->RPH;
     $update_ternakBabiMaster->NonRPH=$request->NonRPH;
     $update_ternakBabiMaster->jmlPotong=$request->jmlPotong;
     $update_ternakBabiMaster->save();

     return redirect('/peternakan/ternakBabi');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakBabi::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakBabi');
    }
}
