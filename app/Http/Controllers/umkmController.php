<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\koperasi\umkmMaster;
use App\Models\koperasi\umkmDetail;
use View;
use App\Models\kecamatan;

class umkmController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = umkmMaster::orderBy('ta','desc')->get();
    $dataChart = umkmMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/koperasi/umkm/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'kecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = umkmMaster::orderBy('ta','desc')->get();
     $dataChart = umkmMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/koperasi/umkm/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = umkmMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalUMKM' => $request->totalUMKM,
        'totalPerdagangan' => $request->totalPerdagangan,
        'totalIndustriPertanian' => $request->totalIndustriPertanian,
        'totalIndustriNonPertanian' => $request->totalIndustriNonPertanian,
        'totalAnekaJasa' => $request->totalAnekaJasa,
      ]);

      $lastkdeKSD= DB::table('umkmMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlUMKM = 'jmlUMKM' . (string)$nomer;
        $xjmlPerdagangan = 'jmlPerdagangan' . (string)$nomer;
        $xjmlIndustriPertanian= 'jmlIndustriPertanian' . (string)$nomer;
        $xjmlIndustriNonPertanian = 'jmlIndustriNonPertanian' . (string)$nomer;
        $xjmlAnekaJasa = 'jmlAnekaJasa' . (string)$nomer;
        $kodel= umkmDetail::create([
          'umkmMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlUMKM' => $request->$xjmlUMKM,
          'jmlPerdagangan' => $request->$xjmlPerdagangan,
          'jmlIndustriPertanian' => $request->$xjmlIndustriPertanian,
          'jmlIndustriNonPertanian' => $request->$xjmlIndustriNonPertanian,
          'jmlAnekaJasa' => $request->$xjmlAnekaJasa,
        ]);
        $nomer ++;
      }
      return redirect('/koperasi/umkm');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = umkmMaster::orderBy('ta','desc')->get();
     $dataDetail = umkmDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('umkmMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = umkmMaster::where('id','=',$kodeEdit)->get();
     $dataChart = umkmMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/koperasi/umkm/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_umkmMaster = umkmMaster::find($id);
     $update_umkmMaster->totalUMKM=$request->totalUMKM;
     $update_umkmMaster->totalPerdagangan=$request->totalPerdagangan;
     $update_umkmMaster->totalIndustriPertanian=$request->totalIndustriPertanian;
     $update_umkmMaster->totalIndustriNonPertanian=$request->totalIndustriNonPertanian;
     $update_umkmMaster->totalAnekaJasa=$request->totalAnekaJasa;
     $update_umkmMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlUMKM = 'jmlUMKM' . (string)$kodeD;
       $xjmlPerdagangan = 'jmlPerdagangan' . (string)$kodeD;
       $xjmlIndustriPertanian= 'jmlIndustriPertanian' . (string)$kodeD;
       $xjmlIndustriNonPertanian = 'jmlIndustriNonPertanian' . (string)$kodeD;
       $xjmlAnekaJasa = 'jmlAnekaJasa' . (string)$kodeD;
       $update_umkmDetail = umkmDetail::where([
                                                  ['umkmMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_umkmDetail->jmlUMKM=$request->$xjmlUMKM;
       $update_umkmDetail->jmlPerdagangan=$request->$xjmlPerdagangan;
       $update_umkmDetail->jmlIndustriPertanian=$request->$xjmlIndustriPertanian;
       $update_umkmDetail->jmlIndustriNonPertanian=$request->$xjmlIndustriNonPertanian;
       $update_umkmDetail->jmlAnekaJasa=$request->$xjmlAnekaJasa;
       $update_umkmDetail->save();
       $kodeD ++;
     }
     return redirect('/koperasi/umkm');
   }
   public function destroy($xdj)
    {
      $cMaster = umkmMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = umkmDetail::where('umkmMaster_id', $xdj)->delete();
      return redirect('/koperasi/umkm');
    }

    public function detail($id){
      $model = umkmMaster::where('ta',$id)->first();
      echo view('koperasi.umkm.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
