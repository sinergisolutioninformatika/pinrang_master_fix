<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kependudukan\pendudukMaster;
use App\Models\kependudukan\pendudukDetail;
use View;
use App\Models\kecamatan;

class pendudukController extends Controller
{
  public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pendudukMaster::orderBy('ta','desc')->get();
     $dataChart = pendudukMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kependudukan/penduduk/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pendudukMaster::orderBy('ta','desc')->get();
     $dataChart = pendudukMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kependudukan/penduduk/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = pendudukMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalPenduduk' => $request->totalPenduduk,
        'totalPendLaki' => $request->totalPendLaki,
        'totalPendPerempuan' => $request->totalPendPerempuan,
        'totalWKTP' => $request->totalWKTP,
        'totalWKTPLaki' => $request->totalWKTPLaki,
        'totalWKTPPerempuan' => $request->totalWKTPPerempuan,
        'totalCetak' => $request->totalCetak,
      ]);

      $lastid= DB::table('pendudukMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlPenduduk = 'jmlPenduduk' . (string)$nomer;
        $xjmlPendLaki = 'jmlPendLaki' . (string)$nomer;
        $xjmlPendPerempuan= 'jmlPendPerempuan' . (string)$nomer;
        $xjmlWKTP = 'jmlWKTP' . (string)$nomer;
        $xjmlWKTPLaki = 'jmlWKTPLaki' . (string)$nomer;
        $xjmlWKTPPerempuan = 'jmlWKTPPerempuan' . (string)$nomer;
        $xjmlCetak = 'jmlCetak' . (string)$nomer;
        $kodel= pendudukDetail::create([
          'pendudukMaster_id' => $lastid->id,
          'kecamatan_id' => $kec->id,
          'jmlPenduduk' => $request->$xjmlPenduduk,
          'jmlPendLaki' => $request->$xjmlPendLaki,
          'jmlPendPerempuan' => $request->$xjmlPendPerempuan,
          'jmlWKTP' => $request->$xjmlWKTP,
          'jmlWKTPLaki' => $request->$xjmlWKTPLaki,
          'jmlWKTPPerempuan' => $request->$xjmlWKTPPerempuan,
          'jmlCetak' => $request->$xjmlCetak,
        ]);
        $nomer ++;
      }
      return redirect('/kependudukan/penduduk');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pendudukMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = pendudukMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = pendudukDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('pendudukMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = pendudukMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = kecamatan::all();
     return view('/kependudukan/penduduk/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_pendudukMaster = pendudukMaster::find($id);
     $update_pendudukMaster->bln=$request->bln;
     $update_pendudukMaster->totalPenduduk=$request->totalPenduduk;
     $update_pendudukMaster->totalPendLaki=$request->totalPendLaki;
     $update_pendudukMaster->totalPendPerempuan=$request->totalPendPerempuan;
     $update_pendudukMaster->totalWKTP=$request->totalWKTP;
     $update_pendudukMaster->totalWKTPLaki=$request->totalWKTPLaki;
     $update_pendudukMaster->totalWKTPPerempuan=$request->totalWKTPPerempuan;
     $update_pendudukMaster->totalCetak=$request->totalCetak;
     $update_pendudukMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlPenduduk = 'jmlPenduduk' . (string)$kodeD;
       $xjmlPendLaki = 'jmlPendLaki' . (string)$kodeD;
       $xjmlPendPerempuan= 'jmlPendPerempuan' . (string)$kodeD;
       $xjmlWKTP = 'jmlWKTP' . (string)$kodeD;
       $xjmlWKTPLaki = 'jmlWKTPLaki' . (string)$kodeD;
       $xjmlWKTPPerempuan = 'jmlWKTPPerempuan' . (string)$kodeD;
       $xjmlCetak = 'jmlCetak' . (string)$kodeD;
       $update_pendudukDetail = pendudukDetail::where([
                                                  ['pendudukMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_pendudukDetail->jmlPenduduk=$request->$xjmlPenduduk;
       $update_pendudukDetail->jmlPendLaki=$request->$xjmlPendLaki;
       $update_pendudukDetail->jmlPendPerempuan=$request->$xjmlPendPerempuan;
       $update_pendudukDetail->jmlWKTP=$request->$xjmlWKTP;
       $update_pendudukDetail->jmlWKTPLaki=$request->$xjmlWKTPLaki;
       $update_pendudukDetail->jmlWKTPPerempuan=$request->$xjmlWKTPPerempuan;
       $update_pendudukDetail->jmlCetak=$request->$xjmlCetak;
       $update_pendudukDetail->save();
       $kodeD ++;
     }
     return redirect('/kependudukan/penduduk');
   }
   public function destroy($xdj)
    {
      $cMaster = pendudukMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = pendudukDetail::where('pendudukMaster_id', $xdj)->delete();
      return redirect('/kependudukan/penduduk');
    }

    public function detail($id){
      $model = pendudukMaster::where('bln', $id)->first();
      echo view('kependudukan.penduduk.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
