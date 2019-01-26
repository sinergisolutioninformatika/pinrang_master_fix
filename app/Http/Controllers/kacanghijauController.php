<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\kacanghijauMaster;
use App\Models\pertanian\kacanghijauDetail;
use View;
use App\Models\kecamatan;

class kacanghijauController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kacanghijauMaster::orderBy('ta','desc')->get();
    $dataChart = kacanghijauMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/kacanghijau/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kacanghijauMaster::orderBy('ta','desc')->get();
     $dataChart = kacanghijauMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kacanghijau/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = kacanghijauMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('kacanghijauMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= kacanghijauDetail::create([
          'kacanghijauMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/kacanghijau');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kacanghijauMaster::orderBy('ta','desc')->get();
     $dataDetail = kacanghijauDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kacanghijauMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = kacanghijauMaster::where('id','=',$kodeEdit)->get();
     $dataChart = kacanghijauMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kacanghijau/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_kacanghijauMaster = kacanghijauMaster::find($id);
     $update_kacanghijauMaster->totalTanam=$request->totalTanam;
     $update_kacanghijauMaster->totalPanen=$request->totalPanen;
     $update_kacanghijauMaster->totalProduksi=$request->totalProduksi;
     $update_kacanghijauMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_kacanghijauMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_kacanghijauDetail = kacanghijauDetail::where([
                                                  ['kacanghijauMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_kacanghijauDetail->jmlTanam=$request->$xjmlTanam;
       $update_kacanghijauDetail->jmlPanen=$request->$xjmlPanen;
       $update_kacanghijauDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_kacanghijauDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_kacanghijauDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/kacanghijau');
   }
   public function destroy($xdj)
    {
      $cMaster = kacanghijauMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kacanghijauDetail::where('kacanghijauMaster_id', $xdj)->delete();
      return redirect('/pertanian/kacanghijau');
    }

    public function detail($id){
      $model = kacanghijauMaster::where('ta', $id)->first();
      echo view('pertanian.kacanghijau.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
