<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\pelanggaranK3;
use View;

class pelanggaranK3Controller extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pelanggaranK3::orderBy('ta','desc')->get();
    $dataChart = pelanggaranK3::orderBy('ta','asc')->get();
    return view('/satpolpp/pelanggaranK3/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pelanggaranK3::orderBy('ta','desc')->get();
     $dataChart = pelanggaranK3::orderBy('ta','asc')->get();
     return view('/satpolpp/pelanggaranK3/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pelanggaranK3::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKasus' => $request->jmlKasus,
      ]);
      return redirect('/satpolpp/pelanggaranK3');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pelanggaranK3::orderBy('ta','desc')->get();
     $dataEdit = pelanggaranK3::where('id','=',$kodeEdit)->get();
     $dataChart = pelanggaranK3::orderBy('ta','asc')->get();
     return view('/satpolpp/pelanggaranK3/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pelanggaranK3Master = pelanggaranK3::find($id);
     $update_pelanggaranK3Master->jmlKasus=$request->jmlKasus;
     $update_pelanggaranK3Master->save();

     return redirect('/satpolpp/pelanggaranK3');
   }
   public function destroy($xdj)
    {
      $cMaster = pelanggaranK3::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/pelanggaranK3');
    }
}
