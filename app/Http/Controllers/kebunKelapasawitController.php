<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKelapasawit;
use View;

class kebunKelapasawitController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKelapasawit::orderBy('ta','desc')->get();
    $dataChart = kebunKelapasawit::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKelapasawit/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKelapasawit::orderBy('ta','desc')->get();
     $dataChart = kebunKelapasawit::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapasawit/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKelapasawit::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKelapasawit');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKelapasawit::orderBy('ta','desc')->get();
     $dataEdit = kebunKelapasawit::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKelapasawit::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapasawit/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKelapasawitMaster = kebunKelapasawit::find($id);
     $update_kebunKelapasawitMaster->Areal=$request->Areal;
     $update_kebunKelapasawitMaster->Petani=$request->Petani;
     $update_kebunKelapasawitMaster->Produksi=$request->Produksi;
     $update_kebunKelapasawitMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKelapasawitMaster->save();

     return redirect('/perkebunan/kebunKelapasawit');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKelapasawit::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKelapasawit');
    }
}
