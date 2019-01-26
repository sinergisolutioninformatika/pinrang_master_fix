<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kominfo\posMaster;
use App\Models\kominfo\posDetail;
use View;
use App\Models\kecamatan;

class posController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = posMaster::orderBy('ta','desc')->get();
    $dataChart = posMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/kominfo/pos/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = posMaster::orderBy('ta','desc')->get();
     $dataChart = posMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/pos/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = posMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalPos' => $request->totalPos,
        'totalPospembantu' => $request->totalPospembantu,
        'totalDesaterlayani' => $request->totalDesaterlayani,
      ]);

      $lastkdeKSD= DB::table('posMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlPos = 'jmlPos' . (string)$nomer;
        $xjmlPospembantu = 'jmlPospembantu' . (string)$nomer;
        $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$nomer;
        $kodel= posDetail::create([
          'posMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlPos' => $request->$xjmlPos,
          'jmlPospembantu' => $request->$xjmlPospembantu,
          'jmlDesaterlayani' => $request->$xjmlDesaterlayani,
        ]);
        $nomer ++;
      }
      return redirect('/kominfo/pos');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = posMaster::orderBy('ta','desc')->get();
     $dataDetail = posDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('posMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = posMaster::where('id','=',$kodeEdit)->get();
     $dataChart = posMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/pos/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_posMaster = posMaster::find($id);
     $update_posMaster->totalPos=$request->totalPos;
     $update_posMaster->totalPospembantu=$request->totalPospembantu;
     $update_posMaster->totalDesaterlayani=$request->totalDesaterlayani;
     $update_posMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlPos = 'jmlPos' . (string)$kodeD;
       $xjmlPospembantu = 'jmlPospembantu' . (string)$kodeD;
       $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$kodeD;
       $update_posDetail = posDetail::where([
                                                  ['posMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_posDetail->jmlPos=$request->$xjmlPos;
       $update_posDetail->jmlPospembantu=$request->$xjmlPospembantu;
       $update_posDetail->jmlDesaterlayani=$request->$xjmlDesaterlayani;
       $update_posDetail->save();
       $kodeD ++;
     }
     return redirect('/kominfo/pos');
   }
   public function destroy($xdj)
    {
      $cMaster = posMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = posDetail::where('posMaster_id', $xdj)->delete();
      return redirect('/kominfo/pos');
    }

    public function detail($id)
    {
      $model = posMaster::where('ta',$id)->first();

      echo view('kominfo.pos.detail',['ta' => $id, 'data' => $model, 'no' => 1]);
    }
}
