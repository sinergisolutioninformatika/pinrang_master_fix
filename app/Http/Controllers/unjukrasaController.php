<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\unjukrasa;
use View;

class unjukrasaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = unjukrasa::orderBy('ta','desc')->get();
    $dataChart = unjukrasa::orderBy('ta','asc')->get();
    return view('/satpolpp/unjukrasa/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = unjukrasa::orderBy('ta','desc')->get();
     $dataChart = unjukrasa::orderBy('ta','asc')->get();
     return view('/satpolpp/unjukrasa/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = unjukrasa::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKasus' => $request->jmlKasus,
        'jmlPolitik' => $request->jmlPolitik,
        'jmlEkonomi' => $request->jmlEkonomi,
        'jmlAgama' => $request->jmlAgama,
        'jmlLainnya' => $request->jmlLainnya,
      ]);
      return redirect('/satpolpp/unjukrasa');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = unjukrasa::orderBy('ta','desc')->get();
     $dataEdit = unjukrasa::where('id','=',$kodeEdit)->get();
     $dataChart = unjukrasa::orderBy('ta','asc')->get();
     return view('/satpolpp/unjukrasa/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_unjukrasaMaster = unjukrasa::find($id);
     $update_unjukrasaMaster->jmlKasus=$request->jmlKasus;
     $update_unjukrasaMaster->jmlPolitik=$request->jmlPolitik;
     $update_unjukrasaMaster->jmlEkonomi=$request->jmlEkonomi;
     $update_unjukrasaMaster->jmlAgama=$request->jmlAgama;
     $update_unjukrasaMaster->jmlLainnya=$request->jmlLainnya;
     $update_unjukrasaMaster->save();

     return redirect('/satpolpp/unjukrasa');
   }
   public function destroy($xdj)
    {
      $cMaster = unjukrasa::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/unjukrasa');
    }
}
