<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\kacangtanahMaster;
use App\Models\pertanian\kacangtanahDetail;
use View;
use App\Models\kecamatan;

class kacangtanahController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kacangtanahMaster::orderBy('ta','desc')->get();
    $dataChart = kacangtanahMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/kacangtanah/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kacangtanahMaster::orderBy('ta','desc')->get();
     $dataChart = kacangtanahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kacangtanah/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = kacangtanahMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalTanam' => $request->totalTanam,
        'totalPanen' => $request->totalPanen,
        'totalProduksi' => $request->totalProduksi,
        'totalProduktivitas' => $request->totalProduktivitas,
      ]);

      $lastkdeKSD= DB::table('kacangtanahMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlTanam = 'jmlTanam' . (string)$nomer;
        $xjmlPanen = 'jmlPanen' . (string)$nomer;
        $xjmlProduksi= 'jmlProduksi' . (string)$nomer;
        $xjmlProduktivitas = 'jmlProduktivitas' . (string)$nomer;
        $kodel= kacangtanahDetail::create([
          'kacangtanahMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTanam' => $request->$xjmlTanam,
          'jmlPanen' => $request->$xjmlPanen,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlProduktivitas' => $request->$xjmlProduktivitas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/kacangtanah');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kacangtanahMaster::orderBy('ta','desc')->get();
     $dataDetail = kacangtanahDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kacangtanahMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = kacangtanahMaster::where('id','=',$kodeEdit)->get();
     $dataChart = kacangtanahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/kacangtanah/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_kacangtanahMaster = kacangtanahMaster::find($id);
     $update_kacangtanahMaster->totalTanam=$request->totalTanam;
     $update_kacangtanahMaster->totalPanen=$request->totalPanen;
     $update_kacangtanahMaster->totalProduksi=$request->totalProduksi;
     $update_kacangtanahMaster->totalProduktivitas=$request->totalProduktivitas;
     $update_kacangtanahMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlTanam = 'jmlTanam' . (string)$kodeD;
       $xjmlPanen = 'jmlPanen' . (string)$kodeD;
       $xjmlProduksi= 'jmlProduksi' . (string)$kodeD;
       $xjmlProduktivitas = 'jmlProduktivitas' . (string)$kodeD;
       $update_kacangtanahDetail = kacangtanahDetail::where([
                                                  ['kacangtanahMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_kacangtanahDetail->jmlTanam=$request->$xjmlTanam;
       $update_kacangtanahDetail->jmlPanen=$request->$xjmlPanen;
       $update_kacangtanahDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_kacangtanahDetail->jmlProduktivitas=$request->$xjmlProduktivitas;
       $update_kacangtanahDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/kacangtanah');
   }
   public function destroy($xdj)
    {
      $cMaster = kacangtanahMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kacangtanahDetail::where('kacangtanahMaster_id', $xdj)->delete();
      return redirect('/pertanian/kacangtanah');
    }

    public function detail($id){
      $model = kacangtanahMaster::where('ta',$id)->first();
      echo view('pertanian.kacangtanah.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
