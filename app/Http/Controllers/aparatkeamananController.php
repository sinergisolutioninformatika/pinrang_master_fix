<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\aparatkeamanan;
use View;

class aparatkeamananController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = aparatkeamanan::orderBy('ta','desc')->get();
    $dataChart = aparatkeamanan::orderBy('ta','asc')->get();
    return view('/satpolpp/aparatkeamanan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = aparatkeamanan::orderBy('ta','desc')->get();
     $dataChart = aparatkeamanan::orderBy('ta','asc')->get();
     return view('/satpolpp/aparatkeamanan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = aparatkeamanan::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlAparat' => $request->jmlAparat,
        'jmlSatpol' => $request->jmlSatpol,
        'jmlLinmas' => $request->jmlLinmas,
        'jmlPatroli' => $request->jmlPatroli,
      ]);
      return redirect('/satpolpp/aparatkeamanan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = aparatkeamanan::orderBy('ta','desc')->get();
     $dataEdit = aparatkeamanan::where('id','=',$kodeEdit)->get();
     $dataChart = aparatkeamanan::orderBy('ta','asc')->get();
     return view('/satpolpp/aparatkeamanan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_aparatkeamananMaster = aparatkeamanan::find($id);
     $update_aparatkeamananMaster->jmlAparat=$request->jmlAparat;
     $update_aparatkeamananMaster->jmlSatpol=$request->jmlSatpol;
     $update_aparatkeamananMaster->jmlLinmas=$request->jmlLinmas;
     $update_aparatkeamananMaster->jmlPatroli=$request->jmlPatroli;
     $update_aparatkeamananMaster->save();

     return redirect('/satpolpp/aparatkeamanan');
   }
   public function destroy($xdj)
    {
      $cMaster = aparatkeamanan::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/aparatkeamanan');
    }
}
