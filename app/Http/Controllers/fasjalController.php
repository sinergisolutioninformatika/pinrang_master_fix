<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perhubungan\fasjal;
use View;

class fasjalController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = fasjal::orderBy('ta','desc')->get();
    $dataChart = fasjal::orderBy('ta','asc')->get();
    return view('/perhubungan/fasjal/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = fasjal::orderBy('ta','desc')->get();
     $dataChart = fasjal::orderBy('ta','asc')->get();
     return view('/perhubungan/fasjal/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = fasjal::create([
        'ta' =>session()->get('thn_anggaran'),
        'Apill' => $request->Apill,
        'Warning' => $request->Warning,
      ]);
      return redirect('/perhubungan/fasjal');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = fasjal::orderBy('ta','desc')->get();
     $dataEdit = fasjal::where('id','=',$kodeEdit)->get();
     $dataChart = fasjal::orderBy('ta','asc')->get();
     return view('/perhubungan/fasjal/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_fasjalMaster = fasjal::find($id);
     $update_fasjalMaster->Apill=$request->Apill;
     $update_fasjalMaster->Warning=$request->Warning;
     $update_fasjalMaster->save();

     return redirect('/perhubungan/fasjal');
   }
   public function destroy($xdj)
    {
      $cMaster = fasjal::find($xdj);
      $cMaster->delete();
      return redirect('/perhubungan/fasjal');
    }
}
