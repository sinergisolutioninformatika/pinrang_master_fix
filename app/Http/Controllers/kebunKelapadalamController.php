<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKelapadalam;
use View;

class kebunKelapadalamController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKelapadalam::orderBy('ta','desc')->get();
    $dataChart = kebunKelapadalam::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKelapadalam/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKelapadalam::orderBy('ta','desc')->get();
     $dataChart = kebunKelapadalam::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapadalam/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKelapadalam::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKelapadalam');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKelapadalam::orderBy('ta','desc')->get();
     $dataEdit = kebunKelapadalam::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKelapadalam::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKelapadalam/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKelapadalamMaster = kebunKelapadalam::find($id);
     $update_kebunKelapadalamMaster->Areal=$request->Areal;
     $update_kebunKelapadalamMaster->Petani=$request->Petani;
     $update_kebunKelapadalamMaster->Produksi=$request->Produksi;
     $update_kebunKelapadalamMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKelapadalamMaster->save();

     return redirect('/perkebunan/kebunKelapadalam');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKelapadalam::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKelapadalam');
    }
}
