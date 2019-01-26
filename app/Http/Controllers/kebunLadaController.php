<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunLada;
use View;

class kebunLadaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunLada::orderBy('ta','desc')->get();
    $dataChart = kebunLada::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunLada/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunLada::orderBy('ta','desc')->get();
     $dataChart = kebunLada::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunLada/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunLada::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunLada');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunLada::orderBy('ta','desc')->get();
     $dataEdit = kebunLada::where('id','=',$kodeEdit)->get();
     $dataChart = kebunLada::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunLada/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunLadaMaster = kebunLada::find($id);
     $update_kebunLadaMaster->Areal=$request->Areal;
     $update_kebunLadaMaster->Petani=$request->Petani;
     $update_kebunLadaMaster->Produksi=$request->Produksi;
     $update_kebunLadaMaster->Produktivitas=$request->Produktivitas;
     $update_kebunLadaMaster->save();

     return redirect('/perkebunan/kebunLada');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunLada::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunLada');
    }
}
