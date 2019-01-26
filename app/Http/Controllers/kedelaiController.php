<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\kedelaiMaster;
use App\Models\pertanian\kedelaiDetail;
use View;
use App\Models\kecamatan;

class kedelaiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kedelaiMaster::orderBy('ta','desc')->get();
    $dataChart = kedelaiMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/kedelai/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kedelaiMaster::orderBy('ta','desc')->get();
     $dataChart = kedelaiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kedelai/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = kedelaiMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('kedelaiMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= kedelaiDetail::create([
          'kedelaiMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/kedelai');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kedelaiMaster::orderBy('ta','desc')->get();
     $dataDetail = kedelaiDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kedelaiMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = kedelaiMaster::where('id','=',$kodeEdit)->get();
     $dataChart = kedelaiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kedelai/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_kedelaiMaster = kedelaiMaster::find($id);
     $update_kedelaiMaster->totalTanam=$request->totalTanam;
     $update_kedelaiMaster->totalPanen=$request->totalPanen;
     $update_kedelaiMaster->totalProduksi=$request->totalProduksi;
     $update_kedelaiMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_kedelaiMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_kedelaiDetail = kedelaiDetail::where([
                                                  ['kedelaiMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_kedelaiDetail->jmlTanam=$request->$xjmlTanam;
       $update_kedelaiDetail->jmlPanen=$request->$xjmlPanen;
       $update_kedelaiDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_kedelaiDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_kedelaiDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/kedelai');
   }
   public function destroy($xdj)
    {
      $cMaster = kedelaiMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kedelaiDetail::where('kedelaiMaster_id', $xdj)->delete();
      return redirect('/pertanian/kedelai');
    }

    public function detail($id){
      $model = kedelaiMaster::where('ta',$id)->first();
      echo view('pertanian/kedelai/detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
