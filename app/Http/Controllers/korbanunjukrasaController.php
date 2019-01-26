<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\korbanunjukrasa;
use View;

class korbanunjukrasaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = korbanunjukrasa::orderBy('ta','desc')->get();
    $dataChart = korbanunjukrasa::orderBy('ta','asc')->get();
    return view('/satpolpp/korbanunjukrasa/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = korbanunjukrasa::orderBy('ta','desc')->get();
     $dataChart = korbanunjukrasa::orderBy('ta','asc')->get();
     return view('/satpolpp/korbanunjukrasa/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = korbanunjukrasa::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKorban' => $request->jmlKorban,
        'jmlMeninggal' => $request->jmlMeninggal,
        'jmlLuka' => $request->jmlLuka,
      ]);
      return redirect('/satpolpp/korbanunjukrasa');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = korbanunjukrasa::orderBy('ta','desc')->get();
     $dataEdit = korbanunjukrasa::where('id','=',$kodeEdit)->get();
     $dataChart = korbanunjukrasa::orderBy('ta','asc')->get();
     return view('/satpolpp/korbanunjukrasa/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_korbanunjukrasaMaster = korbanunjukrasa::find($id);
     $update_korbanunjukrasaMaster->jmlKorban=$request->jmlKorban;
     $update_korbanunjukrasaMaster->jmlMeninggal=$request->jmlMeninggal;
     $update_korbanunjukrasaMaster->jmlLuka=$request->jmlLuka;
     $update_korbanunjukrasaMaster->save();

     return redirect('/satpolpp/korbanunjukrasa');
   }
   public function destroy($xdj)
    {
      $cMaster = korbanunjukrasa::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/korbanunjukrasa');
    }
}
