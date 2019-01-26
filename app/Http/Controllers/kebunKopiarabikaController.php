<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKopiarabika;
use View;

class kebunKopiarabikaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKopiarabika::orderBy('ta','desc')->get();
    $dataChart = kebunKopiarabika::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKopiarabika/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKopiarabika::orderBy('ta','desc')->get();
     $dataChart = kebunKopiarabika::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKopiarabika/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKopiarabika::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKopiarabika');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKopiarabika::orderBy('ta','desc')->get();
     $dataEdit = kebunKopiarabika::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKopiarabika::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKopiarabika/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKopiarabikaMaster = kebunKopiarabika::find($id);
     $update_kebunKopiarabikaMaster->Areal=$request->Areal;
     $update_kebunKopiarabikaMaster->Petani=$request->Petani;
     $update_kebunKopiarabikaMaster->Produksi=$request->Produksi;
     $update_kebunKopiarabikaMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKopiarabikaMaster->save();

     return redirect('/perkebunan/kebunKopiarabika');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKopiarabika::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKopiarabika');
    }
}
