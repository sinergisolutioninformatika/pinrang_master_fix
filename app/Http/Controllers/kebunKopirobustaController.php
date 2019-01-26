<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKopirobusta;
use View;

class kebunKopirobustaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKopirobusta::orderBy('ta','desc')->get();
    $dataChart = kebunKopirobusta::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKopirobusta/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKopirobusta::orderBy('ta','desc')->get();
     $dataChart = kebunKopirobusta::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKopirobusta/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKopirobusta::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKopirobusta');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKopirobusta::orderBy('ta','desc')->get();
     $dataEdit = kebunKopirobusta::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKopirobusta::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKopirobusta/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKopirobustaMaster = kebunKopirobusta::find($id);
     $update_kebunKopirobustaMaster->Areal=$request->Areal;
     $update_kebunKopirobustaMaster->Petani=$request->Petani;
     $update_kebunKopirobustaMaster->Produksi=$request->Produksi;
     $update_kebunKopirobustaMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKopirobustaMaster->save();

     return redirect('/perkebunan/kebunKopirobusta');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKopirobusta::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKopirobusta');
    }
}
