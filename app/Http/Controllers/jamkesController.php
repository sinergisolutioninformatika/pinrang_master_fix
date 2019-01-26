<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kesehatan\jamkesMaster;
use App\Models\kesehatan\jamkesDetail;
use View;
use App\Models\kesehatan\puskesmas;

class jamkesController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = jamkesMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
    $dataChart = jamkesMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
    $puskes = puskesmas::all();
    return view('/kesehatan/jamkes/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataPuskesmas'=>$puskes]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = jamkesMaster::orderBy('ta','desc')->get();
     $dataChart = jamkesMaster::orderBy('ta','asc')->get();
     $puskes = puskesmas::all();
     return view('/kesehatan/jamkes/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataPuskesmas'=>$puskes]);
   }
   public function store(Request $request)
   {
     $puskes = puskesmas::all();
     $kondi = jamkesMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalPeserta' => $request->totalPeserta,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);

      $lastid= DB::table('jamkesMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($puskes as $kec) {
        $xjmlPeserta = 'jmlPeserta' . (string)$nomer;
        $xjmlLaki = 'jmlLaki' . (string)$nomer;
        $xjmlPerempuan = 'jmlPerempuan' . (string)$nomer;
        $kodel= jamkesDetail::create([
          'jamkesMaster_id' => $lastid->id,
          'puskesmas_id' => $kec->id,
          'jmlPeserta' => $request->$xjmlPeserta,
          'jmlLaki' => $request->$xjmlLaki,
          'jmlPerempuan' => $request->$xjmlPerempuan,
        ]);
        $nomer ++;
      }
      return redirect('/kesehatan/jamkes');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = jamkesMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = jamkesMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = jamkesDetail::join('puskesmas','puskesmas.id','=','puskesmas_id')
                                  ->where('jamkesMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = jamkesMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $puskes = puskesmas::all();
     return view('/kesehatan/jamkes/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataPuskesmas'=>$puskes]);
   }

   public function update(Request $request, $id)
   {
     $puskes = puskesmas::all();
     $update_jamkesMaster = jamkesMaster::find($id);
     $update_jamkesMaster->bln=$request->bln;
     $update_jamkesMaster->totalPeserta=$request->totalPeserta;
     $update_jamkesMaster->totalLaki=$request->totalLaki;
     $update_jamkesMaster->totalPerempuan=$request->totalPerempuan;
     $update_jamkesMaster->save();

    $kodeD = 1;
     foreach ($puskes as $dataK) {
       $xjmlPeserta = 'jmlPeserta' . (string)$kodeD;
       $xjmlLaki = 'jmlLaki' . (string)$kodeD;
       $xjmlPerempuan = 'jmlPerempuan' . (string)$kodeD;
       $update_jamkesDetail = jamkesDetail::where([
                                                  ['jamkesMaster_id','=',$id],
                                                  ['puskesmas_id','=',$dataK->id],
                                                ])->first();
       $update_jamkesDetail->jmlPeserta=$request->$xjmlPeserta;
       $update_jamkesDetail->jmlLaki=$request->$xjmlLaki;
       $update_jamkesDetail->jmlPerempuan=$request->$xjmlPerempuan;
       $update_jamkesDetail->save();
       $kodeD ++;
     }
     return redirect('/kesehatan/jamkes');
   }
   public function destroy($xdj)
    {
      $cMaster = jamkesMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = jamkesDetail::where('jamkesMaster_id', $xdj)->delete();
      return redirect('/kesehatan/jamkes');
    }

    public function detail($id){
        $model = jamkesMaster::where('bln', $id)->first();
        echo view('kesehatan.jamkes.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);

    }
}
