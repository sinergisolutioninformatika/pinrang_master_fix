<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pupr\jalan;
use View;

class jalanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = jalan::orderBy('ta','desc')->get();
    $dataChart = jalan::orderBy('ta','asc')->get();
    return view('/pupr/jalan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = jalan::orderBy('ta','desc')->get();
     $dataChart = jalan::orderBy('ta','asc')->get();
     return view('/pupr/jalan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = jalan::create([

        'ta' => session()->get('thn_anggaran'),
        'panjang' => $request->panjang,
        'baik' => $request->baik,
        'sedang' => $request->sedang,
        'rusakringan' => $request->rusakringan,
        'rusakberat' => $request->rusakberat,
      ]);
      return redirect('/pupr/jalan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = jalan::orderBy('ta','desc')->get();
     $dataEdit = jalan::where('id','=',$kodeEdit)->get();
     $dataChart = jalan::orderBy('ta','asc')->get();
     return view('/pupr/jalan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_jalanMaster = jalan::find($id);
     $update_jalanMaster->panjang=$request->panjang;
     $update_jalanMaster->baik=$request->baik;
     $update_jalanMaster->sedang=$request->sedang;
     $update_jalanMaster->rusakringan=$request->rusakringan;
     $update_jalanMaster->rusakberat=$request->rusakberat;
     $update_jalanMaster->save();

     return redirect('/pupr/jalan');
   }
   public function destroy($xdj)
    {
      $cMaster = jalan::find($xdj);
      $cMaster->delete();
      return redirect('/pupr/jalan');
    }
}
