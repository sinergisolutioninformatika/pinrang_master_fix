<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\peternakan\ternakAyamraspedaging;
use View;

class ternakAyamraspedagingController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakAyamraspedaging::orderBy('ta','desc')->get();
     $dataChart = ternakAyamraspedaging::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspedaging/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ternakAyamraspedaging::orderBy('ta','desc')->get();
     $dataChart = ternakAyamraspedaging::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspedaging/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ternakAyamraspedaging::create([
        'ta' => session()->get('thn_anggaran'),
        'Populasi' => $request->Populasi,
        'Kematian' => $request->Kematian,
        'Kelahiran' => $request->Kelahiran,
        'Masuk' => $request->Masuk,
        'Keluar' => $request->Keluar,
        'RPH' => $request->RPH,
        'NonRPH' => $request->NonRPH,
        'jmlPotong' => $request->jmlPotong,
      ]);
      return redirect('/peternakan/ternakAyamraspedaging');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ternakAyamraspedaging::orderBy('ta','desc')->get();
     $dataEdit = ternakAyamraspedaging::where('id','=',$kodeEdit)->get();
     $dataChart = ternakAyamraspedaging::orderBy('ta','asc')->get();
     return view('/peternakan/ternakAyamraspedaging/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ternakAyamraspedagingMaster = ternakAyamraspedaging::find($id);
     $update_ternakAyamraspedagingMaster->Populasi=$request->Populasi;
     $update_ternakAyamraspedagingMaster->Kematian=$request->Kematian;
     $update_ternakAyamraspedagingMaster->Kelahiran=$request->Kelahiran;
     $update_ternakAyamraspedagingMaster->Masuk=$request->Masuk;
     $update_ternakAyamraspedagingMaster->Keluar=$request->Keluar;
     $update_ternakAyamraspedagingMaster->RPH=$request->RPH;
     $update_ternakAyamraspedagingMaster->NonRPH=$request->NonRPH;
     $update_ternakAyamraspedagingMaster->jmlPotong=$request->jmlPotong;
     $update_ternakAyamraspedagingMaster->save();

     return redirect('/peternakan/ternakAyamraspedaging');
   }
   public function destroy($xdj)
    {
      $cMaster = ternakAyamraspedaging::find($xdj);
      $cMaster->delete();
      return redirect('/peternakan/ternakAyamraspedaging');
    }
}
