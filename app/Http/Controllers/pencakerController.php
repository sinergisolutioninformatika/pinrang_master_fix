<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\nakertrans\pencaker;
use View;

class pencakerController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pencaker::orderBy('ta','desc')->get();
    $dataChart = pencaker::orderBy('ta','asc')->get();
    return view('/nakertrans/pencaker/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pencaker::orderBy('ta','desc')->get();
     $dataChart = pencaker::orderBy('ta','asc')->get();
     return view('/nakertrans/pencaker/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pencaker::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlPencaker' => $request->jmlPencaker,
        'pencakerLaki' => $request->pencakerLaki,
        'pencakerPerempuan' => $request->pencakerPerempuan,
        'jmlDitempatkan' => $request->jmlDitempatkan,
        'ditempatkanLaki' => $request->ditempatkanLaki,
        'ditempatkanPerempuan' => $request->ditempatkanPerempuan,
      ]);
      return redirect('/nakertrans/pencaker');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pencaker::orderBy('ta','desc')->get();
     $dataEdit = pencaker::where('id','=',$kodeEdit)->get();
     $dataChart = pencaker::orderBy('ta','asc')->get();
     return view('/nakertrans/pencaker/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pencakerMaster = pencaker::find($id);
     $update_pencakerMaster->jmlPencaker=$request->jmlPencaker;
     $update_pencakerMaster->pencakerLaki=$request->pencakerLaki;
     $update_pencakerMaster->pencakerPerempuan=$request->pencakerPerempuan;
     $update_pencakerMaster->jmlDitempatkan=$request->jmlDitempatkan;
     $update_pencakerMaster->ditempatkanLaki=$request->ditempatkanLaki;
     $update_pencakerMaster->ditempatkanPerempuan=$request->ditempatkanPerempuan;
     $update_pencakerMaster->save();

     return redirect('/nakertrans/pencaker');
   }
   public function destroy($xdj)
    {
      $cMaster = pencaker::find($xdj);
      $cMaster->delete();
      return redirect('/nakertrans/pencaker');
    }
}
