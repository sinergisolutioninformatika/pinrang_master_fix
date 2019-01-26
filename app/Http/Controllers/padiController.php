<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\padiMaster;
use App\Models\pertanian\padiDetail;
use View;
use App\Models\kecamatan;

class padiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = padiMaster::orderBy('ta','desc')->get();
    $dataChart = padiMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/padi/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = padiMaster::orderBy('ta','desc')->get();
     $dataChart = padiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/padi/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = padiMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('padiMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= padiDetail::create([
          'padiMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/padi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = padiMaster::orderBy('ta','desc')->get();
     $dataDetail = padiDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('padiMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = padiMaster::where('id','=',$kodeEdit)->get();
     $dataChart = padiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/padi/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_padiMaster = padiMaster::find($id);
     $update_padiMaster->totalTanam=$request->totalTanam;
     $update_padiMaster->totalPanen=$request->totalPanen;
     $update_padiMaster->totalProduksi=$request->totalProduksi;
     $update_padiMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_padiMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_padiDetail = padiDetail::where([
                                                  ['padiMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_padiDetail->jmlTanam=$request->$xjmlTanam;
       $update_padiDetail->jmlPanen=$request->$xjmlPanen;
       $update_padiDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_padiDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_padiDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/padi');
   }
   public function destroy($xdj)
    {
      $cMaster = padiMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = padiDetail::where('padiMaster_id', $xdj)->delete();
      return redirect('/pertanian/padi');
    }

    public function detail($id)
    {
      $model = padiMaster::where('ta',$id)->first();
      // foreach ($model->padiDetail as $key) {
      //   // echo $key->kecamatan_id.' '.$key->kecamatan;
      //   echo $key->jmlProduktivitas;
      // }
      echo view('pertanian.padi.detail',['ta' =>$id,'data' =>$model,'no'=>1]);
    }
}
