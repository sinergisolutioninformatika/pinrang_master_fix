<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunAren;
use View;

class kebunArenController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunAren::orderBy('ta','desc')->get();
    $dataChart = kebunAren::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunAren/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunAren::orderBy('ta','desc')->get();
     $dataChart = kebunAren::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunAren/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunAren::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunAren');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunAren::orderBy('ta','desc')->get();
     $dataEdit = kebunAren::where('id','=',$kodeEdit)->get();
     $dataChart = kebunAren::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunAren/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunArenMaster = kebunAren::find($id);
     $update_kebunArenMaster->Areal=$request->Areal;
     $update_kebunArenMaster->Petani=$request->Petani;
     $update_kebunArenMaster->Produksi=$request->Produksi;
     $update_kebunArenMaster->Produktivitas=$request->Produktivitas;
     $update_kebunArenMaster->save();

     return redirect('/perkebunan/kebunAren');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunAren::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunAren');
    }
}
