<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\saranakeamanan;
use View;

class saranakeamananController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = saranakeamanan::orderBy('ta','desc')->get();
    $dataChart = saranakeamanan::orderBy('ta','asc')->get();
    return view('/satpolpp/saranakeamanan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = saranakeamanan::orderBy('ta','desc')->get();
     $dataChart = saranakeamanan::orderBy('ta','asc')->get();
     return view('/satpolpp/saranakeamanan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = saranakeamanan::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlSarana' => $request->jmlSarana,
        'jmlPoskeamanan' => $request->jmlPoskeamanan,
        'jmlPoskamling' => $request->jmlPoskamling,
      ]);
      return redirect('/satpolpp/saranakeamanan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = saranakeamanan::orderBy('ta','desc')->get();
     $dataEdit = saranakeamanan::where('id','=',$kodeEdit)->get();
     $dataChart = saranakeamanan::orderBy('ta','asc')->get();
     return view('/satpolpp/saranakeamanan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_saranakeamananMaster = saranakeamanan::find($id);
     $update_saranakeamananMaster->jmlSarana=$request->jmlSarana;
     $update_saranakeamananMaster->jmlPoskeamanan=$request->jmlPoskeamanan;
     $update_saranakeamananMaster->jmlPoskamling=$request->jmlPoskamling;
     $update_saranakeamananMaster->save();

     return redirect('/satpolpp/saranakeamanan');
   }
   public function destroy($xdj)
    {
      $cMaster = saranakeamanan::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/saranakeamanan');
    }
}
