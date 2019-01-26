<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\koperasi\perbankan;
use View;

class perbankanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = perbankan::orderBy('ta','desc')->get();
    $dataChart = perbankan::orderBy('ta','asc')->get();
    return view('/koperasi/perbankan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = perbankan::orderBy('ta','desc')->get();
     $dataChart = perbankan::orderBy('ta','asc')->get();
     return view('/koperasi/perbankan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = perbankan::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlBank' => $request->jmlBank,
        'BUP' => $request->BUP,
        'BPD' => $request->BPD,
        'BSN' => $request->BSN,
        'BAC' => $request->BAC,
        'BPR' => $request->BPR,
      ]);
      return redirect('/koperasi/perbankan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = perbankan::orderBy('ta','desc')->get();
     $dataEdit = perbankan::where('id','=',$kodeEdit)->get();
     $dataChart = perbankan::orderBy('ta','asc')->get();
     return view('/koperasi/perbankan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_perbankanMaster = perbankan::find($id);
     $update_perbankanMaster->jmlBank=$request->jmlBank;
     $update_perbankanMaster->BUP=$request->BUP;
     $update_perbankanMaster->BPD=$request->BPD;
     $update_perbankanMaster->BSN=$request->BSN;
     $update_perbankanMaster->BAC=$request->BAC;
     $update_perbankanMaster->BPR=$request->BPR;
     $update_perbankanMaster->save();

     return redirect('/koperasi/perbankan');
   }
   public function destroy($xdj)
    {
      $cMaster = perbankan::find($xdj);
      $cMaster->delete();
      return redirect('/koperasi/perbankan');
    }
}
