<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\pertikaian;
use View;

class pertikaianController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pertikaian::orderBy('ta','desc')->get();
    $dataChart = pertikaian::orderBy('ta','asc')->get();
    return view('/satpolpp/pertikaian/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pertikaian::orderBy('ta','desc')->get();
     $dataChart = pertikaian::orderBy('ta','asc')->get();
     return view('/satpolpp/pertikaian/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pertikaian::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKasus' => $request->jmlKasus,
        'jmlEtnis' => $request->jmlEtnis,
        'jmlDesa' => $request->jmlDesa,
        'jmlAgama' => $request->jmlAgama,
        'jmlSimpatisan' => $request->jmlSimpatisan,
        'jmlPelajar' => $request->jmlPelajar,
      ]);
      return redirect('/satpolpp/pertikaian');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pertikaian::orderBy('ta','desc')->get();
     $dataEdit = pertikaian::where('id','=',$kodeEdit)->get();
     $dataChart = pertikaian::orderBy('ta','asc')->get();
     return view('/satpolpp/pertikaian/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pertikaianMaster = pertikaian::find($id);
     $update_pertikaianMaster->jmlKasus=$request->jmlKasus;
     $update_pertikaianMaster->jmlEtnis=$request->jmlEtnis;
     $update_pertikaianMaster->jmlDesa=$request->jmlDesa;
     $update_pertikaianMaster->jmlAgama=$request->jmlAgama;
     $update_pertikaianMaster->jmlSimpatisan=$request->jmlSimpatisan;
     $update_pertikaianMaster->jmlPelajar=$request->jmlPelajar;
     $update_pertikaianMaster->save();

     return redirect('/satpolpp/pertikaian');
   }
   public function destroy($xdj)
    {
      $cMaster = pertikaian::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/pertikaian');
    }
}
