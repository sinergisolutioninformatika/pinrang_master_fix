<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkd\eselon;
use View;

class eselonController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = eselon::orderBy('ta','desc')->get();
    $dataChart = eselon::orderBy('ta','asc')->get();
    return view('/bkd/eselon/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = eselon::orderBy('ta','desc')->get();
     $dataChart = eselon::orderBy('ta','asc')->get();
     return view('/bkd/eselon/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = eselon::create([
        'ta' => session()->get('thn_anggaran'),
        'totalPejabat' => $request->totalPejabat,
        'eselonIIa' => $request->eselonIIa,
        'eselonIIb' => $request->eselonIIb,
        'eselonIIIa' => $request->eselonIIIa,
        'eselonIIIb' => $request->eselonIIIb,
        'eselonIVa' => $request->eselonIVa,
        'eselonIVb' => $request->eselonIVb,
        'eselonV' => $request->eselonV,
      ]);
      return redirect('/bkd/eselon');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = eselon::orderBy('ta','desc')->get();
     $dataEdit = eselon::where('id','=',$kodeEdit)->get();
     $dataChart = eselon::orderBy('ta','asc')->get();
     return view('/bkd/eselon/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_eselonMaster = eselon::find($id);
     $update_eselonMaster->totalPejabat=$request->totalPejabat;
     $update_eselonMaster->eselonIIa=$request->eselonIIa;
     $update_eselonMaster->eselonIIb=$request->eselonIIb;
     $update_eselonMaster->eselonIIIa=$request->eselonIIIa;
     $update_eselonMaster->eselonIIIb=$request->eselonIIIb;
     $update_eselonMaster->eselonIVa=$request->eselonIVa;
     $update_eselonMaster->eselonIVb=$request->eselonIVb;
     $update_eselonMaster->eselonV=$request->eselonV;
     $update_eselonMaster->save();

     return redirect('/bkd/eselon');
   }
   public function destroy($xdj)
    {
      $cMaster = eselon::find($xdj);
      $cMaster->delete();
      return redirect('/bkd/eselon');
    }
}
