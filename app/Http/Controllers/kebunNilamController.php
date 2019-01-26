<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunNilam;
use View;

class kebunNilamController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunNilam::orderBy('ta','desc')->get();
    $dataChart = kebunNilam::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunNilam/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunNilam::orderBy('ta','desc')->get();
     $dataChart = kebunNilam::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunNilam/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunNilam::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunNilam');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunNilam::orderBy('ta','desc')->get();
     $dataEdit = kebunNilam::where('id','=',$kodeEdit)->get();
     $dataChart = kebunNilam::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunNilam/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunNilamMaster = kebunNilam::find($id);
     $update_kebunNilamMaster->Areal=$request->Areal;
     $update_kebunNilamMaster->Petani=$request->Petani;
     $update_kebunNilamMaster->Produksi=$request->Produksi;
     $update_kebunNilamMaster->Produktivitas=$request->Produktivitas;
     $update_kebunNilamMaster->save();

     return redirect('/perkebunan/kebunNilam');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunNilam::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunNilam');
    }
}
