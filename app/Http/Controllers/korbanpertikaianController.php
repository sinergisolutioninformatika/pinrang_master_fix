<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\satpolpp\korbanpertikaian;
use View;

class korbanpertikaianController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = korbanpertikaian::orderBy('ta','desc')->get();
    $dataChart = korbanpertikaian::orderBy('ta','asc')->get();
    return view('/satpolpp/korbanpertikaian/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = korbanpertikaian::orderBy('ta','desc')->get();
     $dataChart = korbanpertikaian::orderBy('ta','asc')->get();
     return view('/satpolpp/korbanpertikaian/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = korbanpertikaian::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlKorban' => $request->jmlKorban,
        'jmlMeninggal' => $request->jmlMeninggal,
        'jmlLuka' => $request->jmlLuka,
      ]);
      return redirect('/satpolpp/korbanpertikaian');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = korbanpertikaian::orderBy('ta','desc')->get();
     $dataEdit = korbanpertikaian::where('id','=',$kodeEdit)->get();
     $dataChart = korbanpertikaian::orderBy('ta','asc')->get();
     return view('/satpolpp/korbanpertikaian/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_korbanpertikaianMaster = korbanpertikaian::find($id);
     $update_korbanpertikaianMaster->jmlKorban=$request->jmlKorban;
     $update_korbanpertikaianMaster->jmlMeninggal=$request->jmlMeninggal;
     $update_korbanpertikaianMaster->jmlLuka=$request->jmlLuka;
     $update_korbanpertikaianMaster->save();

     return redirect('/satpolpp/korbanpertikaian');
   }
   public function destroy($xdj)
    {
      $cMaster = korbanpertikaian::find($xdj);
      $cMaster->delete();
      return redirect('/satpolpp/korbanpertikaian');
    }
}
