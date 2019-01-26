<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\nakertrans\transmigrasi;
use View;

class transmigrasiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = transmigrasi::orderBy('ta','desc')->get();
    $dataChart = transmigrasi::orderBy('ta','asc')->get();
    return view('/nakertrans/transmigrasi/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = transmigrasi::orderBy('ta','desc')->get();
     $dataChart = transmigrasi::orderBy('ta','asc')->get();
     return view('/nakertrans/transmigrasi/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = transmigrasi::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'Jumlah' => $request->Jumlah,
        'Lakilaki' => $request->Lakilaki,
        'Perempuan' => $request->Perempuan,
      ]);
      return redirect('/nakertrans/transmigrasi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = transmigrasi::orderBy('ta','desc')->get();
     $dataEdit = transmigrasi::where('id','=',$kodeEdit)->get();
     $dataChart = transmigrasi::orderBy('ta','asc')->get();
     return view('/nakertrans/transmigrasi/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_transmigrasiMaster = transmigrasi::find($id);
     $update_transmigrasiMaster->Jumlah=$request->Jumlah;
     $update_transmigrasiMaster->Lakilaki=$request->Lakilaki;
     $update_transmigrasiMaster->Perempuan=$request->Perempuan;
     $update_transmigrasiMaster->save();

     return redirect('/nakertrans/transmigrasi');
   }
   public function destroy($xdj)
    {
      $cMaster = transmigrasi::find($xdj);
      $cMaster->delete();
      return redirect('/nakertrans/transmigrasi');
    }
}
