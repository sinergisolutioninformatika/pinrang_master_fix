<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakAyamburas;
use View;

class ternakAyamburasController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ternakAyamburas::orderBy('ta','desc')->get();
    $dataChart = ternakAyamburas::orderBy('ta','asc')->get();
    return view('/peternakan/ternakAyamburas/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakAyamburas::orderBy('ta','desc')->get();
     $dataChart = ternakAyamburas::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamburas/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakAyamburas::create([
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
      return redirect('/peternakan/ternakAyamburas');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakAyamburas::orderBy('ta','desc')->get();
     $dataEdit = ternakAyamburas::where('id','=',$kodeEdit)->get();
     $dataChart = ternakAyamburas::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamburas/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakAyamburasMaster = ternakAyamburas::find($id);
     $update_ternakAyamburasMaster->Populasi=$request->Populasi;
     $update_ternakAyamburasMaster->Kematian=$request->Kematian;
     $update_ternakAyamburasMaster->Kelahiran=$request->Kelahiran;
     $update_ternakAyamburasMaster->Masuk=$request->Masuk;
     $update_ternakAyamburasMaster->Keluar=$request->Keluar;
     $update_ternakAyamburasMaster->RPH=$request->RPH;
     $update_ternakAyamburasMaster->NonRPH=$request->NonRPH;
     $update_ternakAyamburasMaster->jmlPotong=$request->jmlPotong;
     $update_ternakAyamburasMaster->save();

     return redirect('/peternakan/ternakAyamburas');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakAyamburas::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakAyamburas');
    }
}
