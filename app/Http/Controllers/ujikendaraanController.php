<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perhubungan\ujikendaraan;
use View;

class ujikendaraanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ujikendaraan::orderBy('ta','desc')->get();
    $dataChart = ujikendaraan::orderBy('ta','asc')->get();
    return view('/perhubungan/ujikendaraan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ujikendaraan::orderBy('ta','desc')->get();
     $dataChart = ujikendaraan::orderBy('ta','asc')->get();
     return view('/perhubungan/ujikendaraan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = ujikendaraan::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlKendaraan' => $request->jmlKendaraan,
        'Mobilpenumpang' => $request->Mobilpenumpang,
        'Mobilbarang' => $request->Mobilbarang,
        'Mobilkhusus' => $request->Mobilkhusus,
        'Keretagandeng' => $request->Keretagandeng,
        'Keretatempelan' => $request->Keretatempelan,
      ]);
      return redirect('/perhubungan/ujikendaraan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ujikendaraan::orderBy('ta','desc')->get();
     $dataEdit = ujikendaraan::where('id','=',$kodeEdit)->get();
     $dataChart = ujikendaraan::orderBy('ta','asc')->get();
     return view('/perhubungan/ujikendaraan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_ujikendaraanMaster = ujikendaraan::find($id);
     $update_ujikendaraanMaster->jmlKendaraan=$request->jmlKendaraan;
     $update_ujikendaraanMaster->Mobilpenumpang=$request->Mobilpenumpang;
     $update_ujikendaraanMaster->Mobilbarang=$request->Mobilbarang;
     $update_ujikendaraanMaster->Mobilkhusus=$request->Mobilkhusus;
     $update_ujikendaraanMaster->Keretagandeng=$request->Keretagandeng;
     $update_ujikendaraanMaster->Keretatempelan=$request->Keretatempelan;
     $update_ujikendaraanMaster->save();

     return redirect('/perhubungan/ujikendaraan');
   }
   public function destroy($xdj)
    {
      $cMaster = ujikendaraan::find($xdj);
      $cMaster->delete();
      return redirect('/perhubungan/ujikendaraan');
    }
}
