<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKelapahybrida;
use View;

class kebunKelapahybridaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKelapahybrida::orderBy('ta','desc')->get();
    $dataChart = kebunKelapahybrida::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKelapahybrida/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKelapahybrida::orderBy('ta','desc')->get();
     $dataChart = kebunKelapahybrida::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapahybrida/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKelapahybrida::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKelapahybrida');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKelapahybrida::orderBy('ta','desc')->get();
     $dataEdit = kebunKelapahybrida::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKelapahybrida::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapahybrida/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKelapahybridaMaster = kebunKelapahybrida::find($id);
     $update_kebunKelapahybridaMaster->Areal=$request->Areal;
     $update_kebunKelapahybridaMaster->Petani=$request->Petani;
     $update_kebunKelapahybridaMaster->Produksi=$request->Produksi;
     $update_kebunKelapahybridaMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKelapahybridaMaster->save();

     return redirect('/perkebunan/kebunKelapahybrida');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKelapahybrida::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKelapahybrida');
    }
}
