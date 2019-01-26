<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bkd\golongan;
use View;

class golonganController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = golongan::orderBy('ta','desc')->get();
    $dataChart = golongan::orderBy('ta','asc')->get();
    return view('/bkd/golongan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = golongan::orderBy('ta','desc')->get();
     $dataChart = golongan::orderBy('ta','asc')->get();
     return view('/bkd/golongan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = golongan::create([
        'ta' => session()->get('thn_anggaran'),
        'totalGol' => $request->totalGol,
        'golI' => $request->golI,
        'golII' => $request->golII,
        'golIII' => $request->golIII,
        'golIV' => $request->golIV,
      ]);
      return redirect('/bkd/golongan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = golongan::orderBy('ta','desc')->get();
     $dataEdit = golongan::where('id','=',$kodeEdit)->get();
     $dataChart = golongan::orderBy('ta','asc')->get();
     return view('/bkd/golongan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_golonganMaster = golongan::find($id);
     $update_golonganMaster->totalGol=$request->totalGol;
     $update_golonganMaster->golI=$request->golI;
     $update_golonganMaster->golII=$request->golII;
     $update_golonganMaster->golIII=$request->golIII;
     $update_golonganMaster->golIV=$request->golIV;
     $update_golonganMaster->save();

     return redirect('/bkd/golongan');
   }
   public function destroy($xdj)
    {
      $cMaster = golongan::find($xdj);
      $cMaster->delete();
      return redirect('/bkd/golongan');
    }
}
