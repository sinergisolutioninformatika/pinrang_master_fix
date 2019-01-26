<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\ubijalarMaster;
use App\Models\pertanian\ubijalarDetail;
use View;
use App\Models\kecamatan;

class ubijalarController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ubijalarMaster::orderBy('ta','desc')->get();
    $dataChart = ubijalarMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/ubijalar/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ubijalarMaster::orderBy('ta','desc')->get();
     $dataChart = ubijalarMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/ubijalar/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = ubijalarMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('ubijalarMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= ubijalarDetail::create([
          'ubijalarMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/ubijalar');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ubijalarMaster::orderBy('ta','desc')->get();
     $dataDetail = ubijalarDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('ubijalarMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = ubijalarMaster::where('id','=',$kodeEdit)->get();
     $dataChart = ubijalarMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/ubijalar/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_ubijalarMaster = ubijalarMaster::find($id);
     $update_ubijalarMaster->totalTanam=$request->totalTanam;
     $update_ubijalarMaster->totalPanen=$request->totalPanen;
     $update_ubijalarMaster->totalProduksi=$request->totalProduksi;
     $update_ubijalarMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_ubijalarMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_ubijalarDetail = ubijalarDetail::where([
                                                  ['ubijalarMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_ubijalarDetail->jmlTanam=$request->$xjmlTanam;
       $update_ubijalarDetail->jmlPanen=$request->$xjmlPanen;
       $update_ubijalarDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_ubijalarDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_ubijalarDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/ubijalar');
   }
   public function destroy($xdj)
    {
      $cMaster = ubijalarMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = ubijalarDetail::where('ubijalarMaster_id', $xdj)->delete();
      return redirect('/pertanian/ubijalar');
    }

    public function detail($id){
      $model = ubijalarMaster::where('ta',$id)->first();
      echo view('pertanian.ubijalar.detail',['ta'=>$id,'data'=>$model, 'no'=>1]);
    }
}
