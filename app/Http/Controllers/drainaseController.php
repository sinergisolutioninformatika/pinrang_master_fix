<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pupr\drainaseMaster;
use App\Models\pupr\drainaseDetail;
use View;
use App\Models\kecamatan;

class drainaseController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = drainaseMaster::orderBy('ta','desc')->get();
    $dataChart = drainaseMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pupr/drainase/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataKecamatan'=>$dataKecamatan]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = drainaseMaster::orderBy('ta','desc')->get();
     $dataChart = drainaseMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/drainase/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = drainaseMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalVol' => $request->totalVol,
      ]);

      $lastkdeKSD= DB::table('drainaseMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlVol = 'jmlVol' . (string)$nomer;
        $kodel= drainaseDetail::create([
          'drainaseMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlVol' => $request->$xjmlVol,
        ]);
        $nomer ++;
      }
      return redirect('/pupr/drainase');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = drainaseMaster::orderBy('ta','desc')->get();
     $dataDetail = drainaseDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('drainaseMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = drainaseMaster::where('id','=',$kodeEdit)->get();
     $dataChart = drainaseMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/drainase/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_drainaseMaster = drainaseMaster::find($id);
     $update_drainaseMaster->totalVol=$request->totalVol;
     $update_drainaseMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlVol = 'jmlVol' . (string)$kodeD;
       $update_drainaseDetail = drainaseDetail::where([
                                                  ['drainaseMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_drainaseDetail->jmlVol=$request->$xjmlVol;
       $update_drainaseDetail->save();
       $kodeD ++;
     }
     return redirect('/pupr/drainase');
   }
   public function destroy($xdj)
    {
      $cMaster = drainaseMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = drainaseDetail::where('drainaseMaster_id', $xdj)->delete();
      return redirect('/pupr/drainase');
    }


    public function detail($id)
    {
      $model = drainaseMaster::where('ta',$id)->first();
      echo view('pupr.drainase.detail',['ta'=>$id,'data'=>$model,'no'=>1]);
    }
}
