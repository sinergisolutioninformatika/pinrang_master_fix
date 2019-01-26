<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunCengkeh;
use View;

class kebunCengkehController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunCengkeh::orderBy('ta','desc')->get();
    $dataChart = kebunCengkeh::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunCengkeh/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunCengkeh::orderBy('ta','desc')->get();
     $dataChart = kebunCengkeh::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunCengkeh/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunCengkeh::create([
        'ta' =>session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunCengkeh');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunCengkeh::orderBy('ta','desc')->get();
     $dataEdit = kebunCengkeh::where('id','=',$kodeEdit)->get();
     $dataChart = kebunCengkeh::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunCengkeh/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunCengkehMaster = kebunCengkeh::find($id);
     $update_kebunCengkehMaster->Areal=$request->Areal;
     $update_kebunCengkehMaster->Petani=$request->Petani;
     $update_kebunCengkehMaster->Produksi=$request->Produksi;
     $update_kebunCengkehMaster->Produktivitas=$request->Produktivitas;
     $update_kebunCengkehMaster->save();

     return redirect('/perkebunan/kebunCengkeh');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunCengkeh::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunCengkeh');
    }
}
