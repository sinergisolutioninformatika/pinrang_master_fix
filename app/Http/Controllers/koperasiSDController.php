<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\koperasi\koperasiMaster;
use App\Models\koperasi\koperasiDetail;
use View;
use App\Models\koperasi\daftar_koperasi;

class koperasiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = koperasiMaster::orderBy('ta','desc')->get();
    $dataChart = koperasiMaster::orderBy('ta','asc')->get();
    $keca = daftar_koperasi::all();
    return view('/koperasi/koperasi/view',['dataA'=> $dataMaster,
                                              'dataC'=> $dataChart,
                                          'daftar_koperasi'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = koperasiMaster::orderBy('ta','desc')->get();
     $dataChart = koperasiMaster::orderBy('ta','asc')->get();
     $keca = daftar_koperasi::all();
     return view('/koperasi/koperasi/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'daftar_koperasi'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = daftar_koperasi::all();
     $kondi = koperasiMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalKoperasi' => $request->totalKoperasi,
        'totalAktif' => $request->totalAktif,
        'totalTidakaktif' => $request->totalTidakaktif,
      ]);

      $lastkdeKSD= DB::table('koperasiMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlKoperasi = 'jmlKoperasi' . (string)$nomer;
        $xjmlAktif = 'jmlAktif' . (string)$nomer;
        $xjmlTidakaktif= 'jmlTidakaktif' . (string)$nomer;
        $kodel= koperasiDetail::create([
          'koperasiMaster_id' => $lastkdeKSD->id,
          'koperasi_id' => $kec->id,
          'jmlKoperasi' => $request->$xjmlKoperasi,
          'jmlAktif' => $request->$xjmlAktif,
          'jmlTidakaktif' => $request->$xjmlTidakaktif,
        ]);
        $nomer ++;
      }
      return redirect('/koperasi/koperasi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = koperasiMaster::orderBy('ta','desc')->get();
     $dataEdit = koperasiMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = koperasiDetail::join('daftar_koperasis','daftar_koperasis.id','=','koperasi_id')
                                  ->where('koperasiMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = koperasiMaster::orderBy('ta','asc')->get();
     $keca = daftar_koperasi::all();
     return view('/koperasi/koperasi/edit',['dataM'=> $dataMaster,
                                            'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                           'dataKoperasi'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = daftar_koperasi::all();
     $update_koperasiMaster = koperasiMaster::find($id);
     $update_koperasiMaster->totalKoperasi=$request->totalKoperasi;
     $update_koperasiMaster->totalAktif=$request->totalAktif;
     $update_koperasiMaster->totalTidakaktif=$request->totalTidakaktif;
     $update_koperasiMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlKoperasi = 'jmlKoperasi' . (string)$kodeD;
       $xjmlAktif = 'jmlAktif' . (string)$kodeD;
       $xrusakRingan= 'jmlTidakaktif' . (string)$kodeD;
       $update_koperasiDetail = koperasiDetail::where([
                                                  ['koperasiMaster_id','=',$id],
                                                  ['koperasi_id','=',$dataK->id],
                                                ])->first();
       $update_koperasiDetail->jmlKoperasi=$request->$xjmlKoperasi;
       $update_koperasiDetail->jmlAktif=$request->$xjmlAktif;
       $update_koperasiDetail->jmlTidakaktif=$request->$xrusakRingan;
       $update_koperasiDetail->save();
       $kodeD ++;
     }
     return redirect('/koperasi/koperasi');
   }
   public function destroy($xdj)
    {
      $cMaster = koperasiMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = koperasiDetail::where('koperasiMaster_id', $xdj)->delete();
      return redirect('/koperasi/koperasi');
    }

    public function detail($id){
      $model = koperasiMaster::where('ta', $id)->first();
      echo view('koperasi.koperasi.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
