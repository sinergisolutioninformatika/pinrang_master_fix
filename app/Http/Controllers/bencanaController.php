<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sosial\bencanaMaster;
use App\Models\sosial\bencanaDetail;
use View;
use App\Models\Sosial\bencana;

class bencanaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = bencanaMaster::orderBy('ta','desc')->get();
    $dataChart = bencanaMaster::orderBy('ta','asc')->get();
    $dataBencana = bencana::all();
    return view('/sosial/bencana/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataBencana'=>$dataBencana]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = bencanaMaster::orderBy('ta','desc')->get();
     $dataChart = bencanaMaster::orderBy('ta','asc')->get();
     $dataBencana = bencana::all();
     return view('/sosial/bencana/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataBencana'=>$dataBencana]);
   }
   public function store(Request $request)
   {
     $dataBencana = bencana::all();
     $kondi = bencanaMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalKejadian' => $request->totalKejadian,
      ]);

      $lastkdeKSD= DB::table('bencanaMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataBencana as $bencana) {
        $xjmlKejadian = 'jmlKejadian' . (string)$nomer;
        $kodel= bencanaDetail::create([
          'bencanaMaster_id' => $lastkdeKSD->id,
          'bencana_id' => $bencana->id,
          'jmlKejadian' => $request->$xjmlKejadian,
        ]);
        $nomer ++;
      }
      return redirect('/sosial/bencana');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = bencanaMaster::orderBy('ta','desc')->get();
     $dataDetail = bencanaDetail::join('bencanas','bencanas.id','=','bencana_id')
                                  ->where('bencanaMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = bencanaMaster::where('id','=',$kodeEdit)->get();
     $dataChart = bencanaMaster::orderBy('ta','asc')->get();
     $dataBencana = bencana::all();
     return view('/sosial/bencana/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataBencana'=>$dataBencana]);
   }

   public function update(Request $request, $id)
   {
     $dataBencana = bencana::all();
     $update_bencanaMaster = bencanaMaster::find($id);
     $update_bencanaMaster->totalKejadian=$request->totalKejadian;
     $update_bencanaMaster->save();

     $kodeD = 1;
     foreach ($dataBencana as $dataK) {
       $xjmlKejadian = 'jmlKejadian' . (string)$kodeD;
       $update_bencanaDetail = bencanaDetail::where([
                                                  ['bencanaMaster_id','=',$id],
                                                  ['bencana_id','=',$dataK->id],
                                                  ])->first();
       $update_bencanaDetail->jmlKejadian=$request->$xjmlKejadian;
       $update_bencanaDetail->save();
       $kodeD ++;
     }
     return redirect('/sosial/bencana');
   }
   public function destroy($xdj)
    {
      $cMaster = bencanaMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = bencanaDetail::where('bencanaMaster_id', $xdj)->delete();
      return redirect('/sosial/bencana');
    }

    public function detail($id)
    {
      $model = bencanaMaster::where('ta',$id)->first();
      echo view('sosial.bencana.detail',['ta'=>$id,'data' => $model, 'no' => 1]);
    }
}
