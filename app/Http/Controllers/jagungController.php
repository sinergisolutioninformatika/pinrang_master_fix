<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\jagungMaster;
use App\Models\pertanian\jagungDetail;
use View;
use App\Models\kecamatan;

class jagungController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = jagungMaster::orderBy('ta','desc')->get();
    $dataChart = jagungMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/jagung/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = jagungMaster::orderBy('ta','desc')->get();
     $dataChart = jagungMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/jagung/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = jagungMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('jagungMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= jagungDetail::create([
          'jagungMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/jagung');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = jagungMaster::orderBy('ta','desc')->get();
     $dataDetail = jagungDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('jagungMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = jagungMaster::where('id','=',$kodeEdit)->get();
     $dataChart = jagungMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/jagung/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_jagungMaster = jagungMaster::find($id);
     $update_jagungMaster->totalTanam=$request->totalTanam;
     $update_jagungMaster->totalPanen=$request->totalPanen;
     $update_jagungMaster->totalProduksi=$request->totalProduksi;
     $update_jagungMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_jagungMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_jagungDetail = jagungDetail::where([
                                                  ['jagungMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_jagungDetail->jmlTanam=$request->$xjmlTanam;
       $update_jagungDetail->jmlPanen=$request->$xjmlPanen;
       $update_jagungDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_jagungDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_jagungDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/jagung');
   }
   public function destroy($xdj)
    {
      $cMaster = jagungMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = jagungDetail::where('jagungMaster_id', $xdj)->delete();
      return redirect('/pertanian/jagung');
    }

   public function detail($id){
     $model = jagungMaster::where('ta', $id)->first();
     echo view('pertanian/jagung/detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
   } 
}
