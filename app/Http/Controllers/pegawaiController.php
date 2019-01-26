<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkd\pegawai;
use View;

class pegawaiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pegawai::orderBy('ta','desc')->get();
    $dataChart = pegawai::orderBy('ta','asc')->get();
    return view('/bkd/pegawai/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pegawai::orderBy('ta','desc')->get();
     $dataChart = pegawai::orderBy('ta','asc')->get();
     return view('/bkd/pegawai/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pegawai::create([
        'ta' => session()->get('thn_anggaran'),
        'totalPegawai' => $request->totalPegawai,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);
      return redirect('/bkd/pegawai');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pegawai::orderBy('ta','desc')->get();
     $dataEdit = pegawai::where('id','=',$kodeEdit)->get();
     $dataChart = pegawai::orderBy('ta','asc')->get();
     return view('/bkd/pegawai/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pegawaiMaster = pegawai::find($id);
     $update_pegawaiMaster->totalPegawai=$request->totalPegawai;
     $update_pegawaiMaster->totalLaki=$request->totalLaki;
     $update_pegawaiMaster->totalPerempuan=$request->totalPerempuan;
     $update_pegawaiMaster->save();

     return redirect('/bkd/pegawai');
   }
   public function destroy($xdj)
    {
      $cMaster = pegawai::find($xdj);
      $cMaster->delete();
      return redirect('/bkd/pegawai');
    }
}
