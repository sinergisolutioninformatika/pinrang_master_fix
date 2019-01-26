<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\kendaraanoperasional;
use View;

class kendaraanoperasionalController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kendaraanoperasional::orderBy('ta','desc')->get();
    $dataChart = kendaraanoperasional::orderBy('ta','asc')->get();
    return view('/satpolpp/kendaraanoperasional/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kendaraanoperasional::orderBy('ta','desc')->get();
     $dataChart = kendaraanoperasional::orderBy('ta','asc')->get();
     return view('/satpolpp/kendaraanoperasional/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kendaraanoperasional::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKendaraan' => $request->jmlKendaraan,
        'jmlRoda2' => $request->jmlRoda2,
        'jmlRoda4' => $request->jmlRoda4,
      ]);
      return redirect('/satpolpp/kendaraanoperasional');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kendaraanoperasional::orderBy('ta','desc')->get();
     $dataEdit = kendaraanoperasional::where('id','=',$kodeEdit)->get();
     $dataChart = kendaraanoperasional::orderBy('ta','asc')->get();
     return view('/satpolpp/kendaraanoperasional/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kendaraanoperasionalMaster = kendaraanoperasional::find($id);
     $update_kendaraanoperasionalMaster->jmlKendaraan=$request->jmlKendaraan;
     $update_kendaraanoperasionalMaster->jmlRoda2=$request->jmlRoda2;
     $update_kendaraanoperasionalMaster->jmlRoda4=$request->jmlRoda4;
     $update_kendaraanoperasionalMaster->save();

     return redirect('/satpolpp/kendaraanoperasional');
   }
   public function destroy($xdj)
    {
      $cMaster = kendaraanoperasional::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/kendaraanoperasional');
    }
}
