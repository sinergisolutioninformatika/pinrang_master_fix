<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\ubikayuMaster;
use App\Models\pertanian\ubikayuDetail;
use View;
use App\Models\kecamatan;

class ubikayuController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ubikayuMaster::orderBy('ta','desc')->get();
    $dataChart = ubikayuMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/ubikayu/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ubikayuMaster::orderBy('ta','desc')->get();
     $dataChart = ubikayuMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/ubikayu/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = ubikayuMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('ubikayuMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= ubikayuDetail::create([
          'ubikayuMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/ubikayu');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ubikayuMaster::orderBy('ta','desc')->get();
     $dataDetail = ubikayuDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('ubikayuMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = ubikayuMaster::where('id','=',$kodeEdit)->get();
     $dataChart = ubikayuMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/ubikayu/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_ubikayuMaster = ubikayuMaster::find($id);
     $update_ubikayuMaster->totalTanam=$request->totalTanam;
     $update_ubikayuMaster->totalPanen=$request->totalPanen;
     $update_ubikayuMaster->totalProduksi=$request->totalProduksi;
     $update_ubikayuMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_ubikayuMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_ubikayuDetail = ubikayuDetail::where([
                                                  ['ubikayuMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_ubikayuDetail->jmlTanam=$request->$xjmlTanam;
       $update_ubikayuDetail->jmlPanen=$request->$xjmlPanen;
       $update_ubikayuDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_ubikayuDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_ubikayuDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/ubikayu');
   }
   public function destroy($xdj)
    {
      $cMaster = ubikayuMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = ubikayuDetail::where('ubikayuMaster_id', $xdj)->delete();
      return redirect('/pertanian/ubikayu');
    }

    public function detail($id){
      $model = ubikayuMaster::where('ta',$id)->first();
      echo view('pertanian.ubikayu.detail',['ta'=>$id, 'data'=>$model,'no'=>1]);
    }
}
