<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunJambumete;
use View;

class kebunJambumeteController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunJambumete::orderBy('ta','desc')->get();
    $dataChart = kebunJambumete::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunJambumete/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunJambumete::orderBy('ta','desc')->get();
     $dataChart = kebunJambumete::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunJambumete/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunJambumete::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunJambumete');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunJambumete::orderBy('ta','desc')->get();
     $dataEdit = kebunJambumete::where('id','=',$kodeEdit)->get();
     $dataChart = kebunJambumete::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunJambumete/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunJambumeteMaster = kebunJambumete::find($id);
     $update_kebunJambumeteMaster->Areal=$request->Areal;
     $update_kebunJambumeteMaster->Petani=$request->Petani;
     $update_kebunJambumeteMaster->Produksi=$request->Produksi;
     $update_kebunJambumeteMaster->Produktivitas=$request->Produktivitas;
     $update_kebunJambumeteMaster->save();

     return redirect('/perkebunan/kebunJambumete');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunJambumete::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunJambumete');
    }
}
