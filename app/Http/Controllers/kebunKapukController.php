<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKapuk;
use View;

class kebunKapukController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKapuk::orderBy('ta','desc')->get();
    $dataChart = kebunKapuk::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKapuk/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKapuk::orderBy('ta','desc')->get();
     $dataChart = kebunKapuk::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKapuk/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKapuk::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKapuk');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKapuk::orderBy('ta','desc')->get();
     $dataEdit = kebunKapuk::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKapuk::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKapuk/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKapukMaster = kebunKapuk::find($id);
     $update_kebunKapukMaster->Areal=$request->Areal;
     $update_kebunKapukMaster->Petani=$request->Petani;
     $update_kebunKapukMaster->Produksi=$request->Produksi;
     $update_kebunKapukMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKapukMaster->save();

     return redirect('/perkebunan/kebunKapuk');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKapuk::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKapuk');
    }
}
