<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kesbangpol\lsm;
use View;

class lsmController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = lsm::orderBy('ta','desc')->get();
    $dataChart = lsm::orderBy('ta','asc')->get();
    return view('/kesbangpol/lsm/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = lsm::orderBy('ta','desc')->get();
     $dataChart = lsm::orderBy('ta','asc')->get();
     return view('/kesbangpol/lsm/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = lsm::create([
        'ta' => $request->session()->get('thn_anggaran'),
        'jmlLSM' => $request->jmlLSM,
        'jmlLokalterdaftar' => $request->jmlLokalterdaftar,
        'jmlLokaltidakterdaftar' => $request->jmlLokaltidakterdaftar,
        'jmlNasionalterdaftar' => $request->jmlNasionalterdaftar,
        'jmlNasionaltidakterdaftar' => $request->jmlNasionaltidakterdaftar,
        'jmlInterterdaftar' => $request->jmlInterterdaftar,
        'jmlIntertidakterdaftar' => $request->jmlIntertidakterdaftar,
      ]);
      return redirect('/kesbangpol/lsm');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = lsm::orderBy('ta','desc')->get();
     $dataEdit = lsm::where('id','=',$kodeEdit)->get();
     $dataChart = lsm::orderBy('ta','asc')->get();
     return view('/kesbangpol/lsm/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_lsmMaster = lsm::find($id);
     $update_lsmMaster->jmlLSM=$request->jmlLSM;
     $update_lsmMaster->jmlLokalterdaftar=$request->jmlLokalterdaftar;
     $update_lsmMaster->jmlLokaltidakterdaftar=$request->jmlLokaltidakterdaftar;
     $update_lsmMaster->jmlNasionalterdaftar=$request->jmlNasionalterdaftar;
     $update_lsmMaster->jmlNasionaltidakterdaftar=$request->jmlNasionaltidakterdaftar;
     $update_lsmMaster->jmlInterterdaftar=$request->jmlInterterdaftar;
     $update_lsmMaster->jmlIntertidakterdaftar=$request->jmlIntertidakterdaftar;
     $update_lsmMaster->save();

     return redirect('/kesbangpol/lsm');
   }
   public function destroy($xdj)
    {
      $cMaster = lsm::find($xdj);
      $cMaster->delete();
      return redirect('/kesbangpol/lsm');
    }
}
