<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perkebunan\kebunKakao;
use View;

class kebunKakaoController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kebunKakao::orderBy('ta','desc')->get();
    $dataChart = kebunKakao::orderBy('ta','asc')->get();
    return view('/perkebunan/kebunKakao/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kebunKakao::orderBy('ta','desc')->get();
     $dataChart = kebunKakao::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKakao/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = kebunKakao::create([
        'ta' => session()->get('thn_anggaran'),
        'Areal' => $request->Areal,
        'Petani' => $request->Petani,
        'Produksi' => $request->Produksi,
        'Produktivitas' => $request->Produktivitas,
      ]);
      return redirect('/perkebunan/kebunKakao');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kebunKakao::orderBy('ta','desc')->get();
     $dataEdit = kebunKakao::where('id','=',$kodeEdit)->get();
     $dataChart = kebunKakao::orderBy('ta','asc')->get();
     return view('/perkebunan/kebunKakao/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_kebunKakaoMaster = kebunKakao::find($id);
     $update_kebunKakaoMaster->Areal=$request->Areal;
     $update_kebunKakaoMaster->Petani=$request->Petani;
     $update_kebunKakaoMaster->Produksi=$request->Produksi;
     $update_kebunKakaoMaster->Produktivitas=$request->Produktivitas;
     $update_kebunKakaoMaster->save();

     return redirect('/perkebunan/kebunKakao');
   }
   public function destroy($xdj)
    {
      $cMaster = kebunKakao::find($xdj);
      $cMaster->delete();
      return redirect('/perkebunan/kebunKakao');
    }
}
