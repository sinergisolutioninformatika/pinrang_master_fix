<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkd\pegawaiagama;
use View;

class pegawaiagamaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pegawaiagama::orderBy('ta','desc')->get();
    $dataChart = pegawaiagama::orderBy('ta','asc')->get();
    return view('/bkd/pegawaiagama/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pegawaiagama::orderBy('ta','desc')->get();
     $dataChart = pegawaiagama::orderBy('ta','asc')->get();
     return view('/bkd/pegawaiagama/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pegawaiagama::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlIslam' => $request->jmlIslam,
        'jmlKatolik' => $request->jmlKatolik,
        'jmlProtestan' => $request->jmlProtestan,
        'jmlBudha' => $request->jmlBudha,
        'jmlHindu' => $request->jmlHindu,
      ]);
      return redirect('/bkd/pegawaiagama');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pegawaiagama::orderBy('ta','desc')->get();
     $dataEdit = pegawaiagama::where('id','=',$kodeEdit)->get();
     $dataChart = pegawaiagama::orderBy('ta','asc')->get();
     return view('/bkd/pegawaiagama/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pegawaiagamaMaster = pegawaiagama::find($id);
     $update_pegawaiagamaMaster->jmlIslam=$request->jmlIslam;
     $update_pegawaiagamaMaster->jmlKatolik=$request->jmlKatolik;
     $update_pegawaiagamaMaster->jmlProtestan=$request->jmlProtestan;
     $update_pegawaiagamaMaster->jmlBudha=$request->jmlBudha;
     $update_pegawaiagamaMaster->jmlHindu=$request->jmlHindu;
     $update_pegawaiagamaMaster->save();

     return redirect('/bkd/pegawaiagama');
   }
   public function destroy($xdj)
    {
      $cMaster = pegawaiagama::find($xdj);
      $cMaster->delete();
      return redirect('/bkd/pegawaiagama');
    }
}
