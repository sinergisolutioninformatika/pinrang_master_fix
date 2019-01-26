<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakKerbau;
use View;

class ternakKerbauController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakKerbau::orderBy('ta','desc')->get();
     $dataChart = ternakKerbau::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKerbau/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakKerbau::orderBy('ta','desc')->get();
     $dataChart = ternakKerbau::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKerbau/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakKerbau::create([
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
      return redirect('/peternakan/ternakKerbau');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakKerbau::orderBy('ta','desc')->get();
     $dataEdit = ternakKerbau::where('id','=',$kodeEdit)->get();
     $dataChart = ternakKerbau::orderBy('ta','asc')->get();
     return view('/peternakan/ternakKerbau/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakKerbauMaster = ternakKerbau::find($id);
     $update_ternakKerbauMaster->Populasi=$request->Populasi;
     $update_ternakKerbauMaster->Kematian=$request->Kematian;
     $update_ternakKerbauMaster->Kelahiran=$request->Kelahiran;
     $update_ternakKerbauMaster->Masuk=$request->Masuk;
     $update_ternakKerbauMaster->Keluar=$request->Keluar;
     $update_ternakKerbauMaster->RPH=$request->RPH;
     $update_ternakKerbauMaster->NonRPH=$request->NonRPH;
     $update_ternakKerbauMaster->jmlPotong=$request->jmlPotong;
     $update_ternakKerbauMaster->save();

     return redirect('/peternakan/ternakKerbau');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakKerbau::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakKerbau');
    }
}
