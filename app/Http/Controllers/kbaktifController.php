<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ppkb\kbaktifMaster;
use App\Models\ppkb\kbaktifDetail;
use View;
use App\Models\kecamatan;

class kbaktifController extends Controller
{
  public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kbaktifMaster::orderBy('ta','desc')->get();
     $dataChart = kbaktifMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/ppkb/kbaktif/view',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kbaktifMaster::orderBy('ta','desc')->get();
     $dataChart = kbaktifMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/ppkb/kbaktif/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kbaktifMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalPPMKab' => $request->totalPPMKab,
        'totalPPMProv' => $request->totalPPMProv,
        'totalPPMPusat' => $request->totalPPMPusat,
        'totalIUD' => $request->totalIUD,
        'totalMOP' => $request->totalMOP,
        'totalMOW' => $request->totalMOW,
        'totalIMP' => $request->totalIMP,
        'totalSTK' => $request->totalSTK,
        'totalPIL' => $request->totalPIL,
        'totalKDM' => $request->totalKDM,
      ]);

      $lastkdeKSD= DB::table('kbaktifMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlPPMKab = 'jmlPPMKab' . (string)$nomer;
        $xjmlPPMProv = 'jmlPPMProv' . (string)$nomer;
        $xjmlPPMPusat= 'jmlPPMPusat' . (string)$nomer;
        $xjmlIUD = 'jmlIUD' . (string)$nomer;
        $xjmlMOP = 'jmlMOP' . (string)$nomer;
        $xjmlMOW = 'jmlMOW' . (string)$nomer;
        $xjmlIMP= 'jmlIMP' . (string)$nomer;
        $xjmlSTK = 'jmlSTK' . (string)$nomer;
        $xjmlPIL= 'jmlPIL' . (string)$nomer;
        $xjmlKDM = 'jmlKDM' . (string)$nomer;
        $kodel= kbaktifDetail::create([
          'kbaktifMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlPPMKab' => $request->$xjmlPPMKab,
          'jmlPPMProv' => $request->$xjmlPPMProv,
          'jmlPPMPusat' => $request->$xjmlPPMPusat,
          'jmlIUD' => $request->$xjmlIUD,
          'jmlMOP' => $request->$xjmlMOP,
          'jmlMOW' => $request->$xjmlMOW,
          'jmlIMP' => $request->$xjmlIMP,
          'jmlSTK' => $request->$xjmlSTK,
          'jmlPIL' => $request->$xjmlPIL,
          'jmlKDM' => $request->$xjmlKDM,
        ]);
        $nomer ++;
      }
      return redirect('/ppkb/kbaktif');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kbaktifMaster::orderBy('ta','desc')->get();
     $dataDetail = kbaktifDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kbaktifMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kbaktifMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/ppkb/kbaktif/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kbaktifMaster = kbaktifMaster::find($id);
     $update_kbaktifMaster->totalPPMKab=$request->totalPPMKab;
     $update_kbaktifMaster->totalPPMProv=$request->totalPPMProv;
     $update_kbaktifMaster->totalPPMPusat=$request->totalPPMPusat;
     $update_kbaktifMaster->totalIUD=$request->totalIUD;
     $update_kbaktifMaster->totalMOP=$request->totalMOP;
     $update_kbaktifMaster->totalMOW=$request->totalMOW;
     $update_kbaktifMaster->totalIMP=$request->totalIMP;
     $update_kbaktifMaster->totalSTK=$request->totalSTK;
     $update_kbaktifMaster->totalPIL=$request->totalPIL;
     $update_kbaktifMaster->totalKDM=$request->totalKDM;
     $update_kbaktifMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlPPMKab = 'jmlPPMKab' . (string)$kodeD;
       $xjmlPPMProv = 'jmlPPMProv' . (string)$kodeD;
       $xjmlPPMPusat= 'jmlPPMPusat' . (string)$kodeD;
       $xjmlIUD = 'jmlIUD' . (string)$kodeD;
       $xjmlMOP = 'jmlMOP' . (string)$kodeD;
       $xjmlMOW = 'jmlMOW' . (string)$kodeD;
       $xjmlIMP= 'jmlIMP' . (string)$kodeD;
       $xjmlSTK = 'jmlSTK' . (string)$kodeD;
       $xjmlPIL= 'jmlPIL' . (string)$kodeD;
       $xjmlKDM = 'jmlKDM' . (string)$kodeD;
       $update_kbaktifDetail = kbaktifDetail::where([
                                                  ['kbaktifMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kbaktifDetail->jmlPPMKab=$request->$xjmlPPMKab;
       $update_kbaktifDetail->jmlPPMProv=$request->$xjmlPPMProv;
       $update_kbaktifDetail->jmlPPMPusat=$request->$xjmlPPMPusat;
       $update_kbaktifDetail->jmlIUD=$request->$xjmlIUD;
       $update_kbaktifDetail->jmlMOP=$request->$xjmlMOP;
       $update_kbaktifDetail->jmlMOW=$request->$xjmlMOW;
       $update_kbaktifDetail->jmlIMP=$request->$xjmlIMP;
       $update_kbaktifDetail->jmlSTK=$request->$xjmlSTK;
       $update_kbaktifDetail->jmlPIL=$request->$xjmlPIL;
       $update_kbaktifDetail->jmlKDM=$request->$xjmlKDM;
       $update_kbaktifDetail->save();
       $kodeD ++;
     }
     return redirect('/ppkb/kbaktif');
   }
   public function destroy($xdj)
    {
      $cMaster = kbaktifMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kbaktifDetail::where('kbaktifMaster_id', $xdj)->delete();
      return redirect('/ppkb/kbaktif');
    }

    public function detail($id){
      $model = kbaktifMaster::where('ta', $id)->first();
      echo view('ppkb.kbaktif.detail', ['ta'=> $id, 'data'=>$model, 'no'=>1]);
    }
}
