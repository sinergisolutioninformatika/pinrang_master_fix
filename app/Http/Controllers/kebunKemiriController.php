<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKemiri;
use View;

class kebunKemiriController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKemiri::orderBy('ta','desc')->get();
    $dataChart = kebunKemiri::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKemiri/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKemiri::orderBy('ta','desc')->get();
     $dataChart = kebunKemiri::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKemiri/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKemiri::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKemiri');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKemiri::orderBy('ta','desc')->get();
     $dataEdit = kebunKemiri::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKemiri::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKemiri/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKemiriMaster = kebunKemiri::find($id);
     $update_kebunKemiriMaster->Areal=$request->Areal;
     $update_kebunKemiriMaster->Petani=$request->Petani;
     $update_kebunKemiriMaster->Produksi=$request->Produksi;
     $update_kebunKemiriMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKemiriMaster->save();

     return redirect('/perkebunan/kebunKemiri');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKemiri::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKemiri');
    }
}
