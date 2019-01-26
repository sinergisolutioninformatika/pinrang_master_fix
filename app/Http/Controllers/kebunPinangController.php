<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunPinang;
use View;

class kebunPinangController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunPinang::orderBy('ta','desc')->get();
    $dataChart = kebunPinang::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunPinang/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunPinang::orderBy('ta','desc')->get();
     $dataChart = kebunPinang::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPinang/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunPinang::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunPinang');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunPinang::orderBy('ta','desc')->get();
     $dataEdit = kebunPinang::where('id','=',$kodeEdit)->get();
     $dataChart = kebunPinang::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunPinang/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunPinangMaster = kebunPinang::find($id);
     $update_kebunPinangMaster->Areal=$request->Areal;
     $update_kebunPinangMaster->Petani=$request->Petani;
     $update_kebunPinangMaster->Produksi=$request->Produksi;
     $update_kebunPinangMaster->Produktivitas=$request->Produktivitas;
     $update_kebunPinangMaster->save();

     return redirect('/perkebunan/kebunPinang');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunPinang::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunPinang');
    }
}
