<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pupr\bangunanMaster;
use App\Models\pupr\bangunanDetail;
use View;
use App\Models\kecamatan;

class bangunanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = bangunanMaster::orderBy('ta','desc')->get();
    $dataChart = bangunanMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pupr/bangunan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = bangunanMaster::orderBy('ta','desc')->get();
     $dataChart = bangunanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/bangunan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = bangunanMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalUnit' => $request->totalUnit,
      ]);

      $lastkdeKSD= DB::table('bangunanMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlUnit = 'jmlUnit' . (string)$nomer;
        $kodel= bangunanDetail::create([
          'bangunanMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlUnit' => $request->$xjmlUnit,
        ]);
        $nomer ++;
      }
      return redirect('/pupr/bangunan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = bangunanMaster::orderBy('ta','desc')->get();
     $dataDetail = bangunanDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('bangunanMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = bangunanMaster::where('id','=',$kodeEdit)->get();
     $dataChart = bangunanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/bangunan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_bangunanMaster = bangunanMaster::find($id);
     $update_bangunanMaster->totalUnit=$request->totalUnit;
     $update_bangunanMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlUnit = 'jmlUnit' . (string)$kodeD;
       $update_bangunanDetail = bangunanDetail::where([
                                                  ['bangunanMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_bangunanDetail->jmlUnit=$request->$xjmlUnit;
       $update_bangunanDetail->save();
       $kodeD ++;
     }
     return redirect('/pupr/bangunan');
   }
   public function destroy($xdj)
    {
      $cMaster = bangunanMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = bangunanDetail::where('bangunanMaster_id', $xdj)->delete();
      return redirect('/pupr/bangunan');
    }

    public function detail($id){
      $model = bangunanMaster::where('ta', $id)->first();
      echo view('pupr.bangunan.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }

}










