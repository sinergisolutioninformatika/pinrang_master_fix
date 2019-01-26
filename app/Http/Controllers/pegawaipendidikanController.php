<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkd\pegawaipendidikan;
use View;

class pegawaipendidikanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pegawaipendidikan::orderBy('ta','desc')->get();
    $dataChart = pegawaipendidikan::orderBy('ta','asc')->get();
    return view('/bkd/pegawaipendidikan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pegawaipendidikan::orderBy('ta','desc')->get();
     $dataChart = pegawaipendidikan::orderBy('ta','asc')->get();
     return view('/bkd/pegawaipendidikan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = pegawaipendidikan::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlSD' => $request->jmlSD,
        'jmlSMP' => $request->jmlSMP,
        'jmlSMA' => $request->jmlSMA,
        'jmlD1' => $request->jmlD1,
        'jmlD2' => $request->jmlD2,
        'jmlD3' => $request->jmlD3,
        'jmlS1' => $request->jmlS1,
        'jmlS2' => $request->jmlS2,
        'jmlS3' => $request->jmlS3,
      ]);
      return redirect('/bkd/pegawaipendidikan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pegawaipendidikan::orderBy('ta','desc')->get();
     $dataEdit = pegawaipendidikan::where('id','=',$kodeEdit)->get();
     $dataChart = pegawaipendidikan::orderBy('ta','asc')->get();
     return view('/bkd/pegawaipendidikan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_pegawaipendidikanMaster = pegawaipendidikan::find($id);
     $update_pegawaipendidikanMaster->jmlSD=$request->jmlSD;
     $update_pegawaipendidikanMaster->jmlSMP=$request->jmlSMP;
     $update_pegawaipendidikanMaster->jmlSMA=$request->jmlSMA;
     $update_pegawaipendidikanMaster->jmlD1=$request->jmlD1;
     $update_pegawaipendidikanMaster->jmlD2=$request->jmlD2;
     $update_pegawaipendidikanMaster->jmlD3=$request->jmlD3;
     $update_pegawaipendidikanMaster->jmlS1=$request->jmlS1;
     $update_pegawaipendidikanMaster->jmlS2=$request->jmlS2;
     $update_pegawaipendidikanMaster->jmlS3=$request->jmlS3;
     $update_pegawaipendidikanMaster->save();

     return redirect('/bkd/pegawaipendidikan');
   }
   public function destroy($xdj)
    {
      $cMaster = pegawaipendidikan::find($xdj);
      $cMaster->delete();
      return redirect('/bkd/pegawaipendidikan');
    }
}
