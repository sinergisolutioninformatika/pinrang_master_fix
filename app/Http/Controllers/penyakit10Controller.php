<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kesehatan\penyakit10Master;
use App\Models\kesehatan\penyakit10Detail;
use View;
use App\Models\kesehatan\puskesmas;
use App\Models\kesehatan\penyakit;

class penyakit10Controller extends Controller
{
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = DB::table('penyakit10Details')
                      ->join('penyakits','penyakit10Details.penyakit_id','=','penyakits.id')
                      ->select(DB::raw('nmaPenyakit, sum(jmlKasus) as jmlKasus,sum(jmlRawatJalan) as jmlRawatJalan ,sum(jmlRawatInap) as jmlRawatInap, penyakit_id'))
                      ->groupBy('penyakit_id','jmlKasus','nmaPenyakit')
                      ->orderBy('jmlKasus','desc')
                      ->limit(10)
                      ->get();
     $pk = puskesmas::all();
     $py = penyakit::all();
     return view('/kesehatan/penyakit10/home',['dataMaster'=> $dataMaster,
                                               'dataPenyakit'=> $py,
                                               'dataPuskesmas'=>$pk]);
   }
   public function store(Request $request)
   {
     $pk = puskesmas::all();
     $kondi = penyakit10Master::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'puskesmas_id' => $request->puskesmas_id,
        'totalKasus' => $request->totalKasus,
        'totalRawatJalan' => $request->totalRawatJalan,
        'totalRawatInap' => $request->totalRawatInap,
      ]);

      $lastid= DB::table('penyakit10Masters')->orderBy('id', 'desc')->first();
      for ($i=1; $i <=10 ; $i++) {
        $xpenyakit_id = $i;
        $xjmlKasus = 'jmlKasus' . (string)$i;
        $xjmlRawatJalan = 'jmlRawatJalan' . (string)$i;
        $xjmlRawatInap = 'jmlRawatInap' . (string)$i;
        $kodel= penyakit10Detail::create([
          'penyakit10Master_id' => $lastid->id,
          'puskesmas_id' => $request->puskesmas_id,
          'penyakit_id' => $xpenyakit_id,
          'jmlKasus' => $request->$xjmlKasus,
          'jmlRawatJalan' => $request->$xjmlRawatJalan,
          'jmlRawatInap' => $request->$xjmlRawatInap,
        ]);
      }
      return redirect('/kesehatan/penyakit10');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = penyakit10Master::orderBy('ta','desc')->get();
     $dataEdit = penyakit10Master::where('id','=',$kodeEdit)->get();
     $dataDetail = penyakit10Detail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('penyakit10Master_id','=', $kodeEdit)
                                  ->get();
     $dataChart = penyakit10Master::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kesehatan/penyakit10/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_penyakit10Master = penyakit10Master::find($id);
     $update_penyakit10Master->bln=$request->bln;
     $update_penyakit10Master->totalKasus=$request->totalKasus;
     $update_penyakit10Master->totalRawatjalan=$request->totalRawatjalan;
     $update_penyakit10Master->totalRawatInap=$request->totalRawatInap;
     $update_penyakit10Master->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlpenyakit10 = 'jmlpenyakit10' . (string)$kodeD;
       $xjmlCerai = 'jmlCerai' . (string)$kodeD;
       $update_penyakit10Detail = penyakit10Detail::where([
                                                  ['penyakit10Master_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_penyakit10Detail->jmlKasus=$request->$xjmlKasus;
       $update_penyakit10Detail->jmlRawatJalan=$request->$xjmlRawatJalan;
       $update_penyakit10Detail->jmlRawatInap=$request->$xjmlRawatInap;
       $update_penyakit10Detail->save();
       $kodeD ++;
     }
     return redirect('/kesehatan/penyakit10');
   }
   public function destroy($xdj)
    {
      $cMaster = penyakit10Master::find($xdj);
      $cMaster->delete();
      $deletedRows = penyakit10Detail::where('penyakit10Master_id', $xdj)->delete();
      return redirect('/kesehatan/penyakit10');
    }
}
