<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunPala;
use View;

class kebunPalaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunPala::orderBy('ta','desc')->get();
    $dataChart = kebunPala::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunPala/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunPala::orderBy('ta','desc')->get();
     $dataChart = kebunPala::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPala/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunPala::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunPala');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunPala::orderBy('ta','desc')->get();
     $dataEdit = kebunPala::where('id','=',$kodeEdit)->get();
     $dataChart = kebunPala::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPala/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunPalaMaster = kebunPala::find($id);
     $update_kebunPalaMaster->Areal=$request->Areal;
     $update_kebunPalaMaster->Petani=$request->Petani;
     $update_kebunPalaMaster->Produksi=$request->Produksi;
     $update_kebunPalaMaster->Produktivitas=$request->Produktivitas;
     $update_kebunPalaMaster->save();

     return redirect('/perkebunan/kebunPala');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunPala::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunPala');
    }
}
