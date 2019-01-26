<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunPanili;
use View;

class kebunPaniliController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunPanili::orderBy('ta','desc')->get();
    $dataChart = kebunPanili::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunPanili/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunPanili::orderBy('ta','desc')->get();
     $dataChart = kebunPanili::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPanili/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunPanili::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunPanili');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunPanili::orderBy('ta','desc')->get();
     $dataEdit = kebunPanili::where('id','=',$kodeEdit)->get();
     $dataChart = kebunPanili::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPanili/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunPaniliMaster = kebunPanili::find($id);
     $update_kebunPaniliMaster->Areal=$request->Areal;
     $update_kebunPaniliMaster->Petani=$request->Petani;
     $update_kebunPaniliMaster->Produksi=$request->Produksi;
     $update_kebunPaniliMaster->Produktivitas=$request->Produktivitas;
     $update_kebunPaniliMaster->save();

     return redirect('/perkebunan/kebunPanili');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunPanili::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunPanili');
    }
}
