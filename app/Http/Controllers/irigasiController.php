<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\psda\irigasiMaster;
use App\Models\psda\irigasiDetail;
use App\Models\psda\uptd_psda;
use View;


class irigasiController extends Controller
{
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = irigasiMaster::orderBy('ta','desc')->get();
     $dataChart = irigasiMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/irigasi/home',['dataMaster'=> $dataMaster,
                                        'dataChart'=> $dataChart,
                                           'uptd'=>$uptd]);
   }
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = irigasiMaster::orderBy('ta','desc')->get();
     $dataChart = irigasiMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/irigasi/view',['dataMaster'=> $dataMaster,
                                        'dataChart'=> $dataChart,
                                           'uptd'=>$uptd]);
   }
   public function store(Request $request)
   {
     $uptd = uptd_psda::all();
     $kondi = irigasiMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTersier' => $request->totalTersier,
        'totalSekunder' => $request->totalSekunder,
        'totalInduk' => $request->totalInduk,
        'totalKuarter' => $request->totalKuarter,
      ]);

      $lastid= DB::table('irigasiMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($uptd as $kec) {
        $xjmlTersier = 'jmlTersier' . (string)$nomer;
        $xjmlSekunder = 'jmlSekunder' . (string)$nomer;
        $xjmlInduk = 'jmlInduk' . (string)$nomer;
        $xjmlKuarter = 'jmlKuarter' . (string)$nomer;
        $kodel= irigasiDetail::create([
          'irigasiMaster_id' => $lastid->id,
          'uptd_psda_id' => $kec->id,
          'jmlTersier' => $request->$xjmlTersier,
          'jmlSekunder' => $request->$xjmlSekunder,
          'jmlInduk' => $request->$xjmlInduk,
          'jmlKuarter' => $request->$xjmlKuarter,
        ]);
        $nomer ++;
      }
      return redirect('/psda/irigasi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = irigasiMaster::orderBy('ta','desc')->get();
     $dataEdit = irigasiMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = irigasiDetail::join('uptd_psdas','uptd_psdas.id','=','uptd_psda_id')
                                  ->where('irigasiMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = irigasiMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/irigasi/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                                    'uptd'=>$uptd]);
   }

   public function update(Request $request, $id)
   {
     $uptd = uptd_psda::all();
     $update_irigasiMaster = irigasiMaster::find($id);
     $update_irigasiMaster->totalTersier=$request->totalTersier;
     $update_irigasiMaster->totalSekunder=$request->totalSekunder;
     $update_irigasiMaster->totalInduk=$request->totalInduk;
     $update_irigasiMaster->totalKuarter=$request->totalKuarter;
     $update_irigasiMaster->save();

    $kodeD = 1;
     foreach ($uptd as $dataK) {
       $xjmlTersier = 'jmlTersier' . (string)$kodeD;
       $xjmlSekunder= 'jmlSekunder' . (string)$kodeD;
       $xjmlInduk= 'jmlInduk' . (string)$kodeD;
       $xjmlKuarter= 'jmlKuarter' . (string)$kodeD;
       $update_irigasiDetail = irigasiDetail::where([
                                                  ['irigasiMaster_id','=',$id],
                                                  ['uptd_psda_id','=',$dataK->id],
                                                ])->first();
       $update_irigasiDetail->jmlTersier=$request->$xjmlTersier;
       $update_irigasiDetail->jmlSekunder=$request->$xjmlSekunder;
       $update_irigasiDetail->jmlInduk=$request->$xjmlInduk;
       $update_irigasiDetail->jmlKuarter=$request->$xjmlKuarter;
       $update_irigasiDetail->save();
       $kodeD ++;
     }
     return redirect('/psda/irigasi');
   }
   public function destroy($xdj)
    {
      $cMaster = irigasiMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = irigasiDetail::where('irigasiMaster_id', $xdj)->delete();
      return redirect('/psda/irigasi');
    }

    public function detail($id)
    {
      $model = irigasiMaster::where('ta',$id)->first();
      echo view('psda.irigasi.detail',['ta'=>$id,'data'=>$model,'no'=>1]);      
    }
}
