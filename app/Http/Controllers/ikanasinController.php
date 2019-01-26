<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\ikanasinMaster;
use App\Models\perikanan\ikanasinDetail;
use View;
use App\Models\kecamatan;

class ikanasinController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ikanasinMaster::orderBy('ta','desc')->get();
    $dataChart = ikanasinMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/ikanasin/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ikanasinMaster::orderBy('ta','desc')->get();
     $dataChart = ikanasinMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/ikanasin/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = ikanasinMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalProduksi' => $request->totalProduksi,
        'totalLaut' => $request->totalLaut,
        'totalDarat' => $request->totalDarat,
      ]);

      $lastkdeKSD= DB::table('ikanasinMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlProduksi = 'jmlProduksi' . (string)$nomer;
        $xjmlLaut = 'jmlLaut' . (string)$nomer;
        $xjmlDarat= 'jmlDarat' . (string)$nomer;
        $kodel= ikanasinDetail::create([
          'ikanasinMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlLaut' => $request->$xjmlLaut,
          'jmlDarat' => $request->$xjmlDarat,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/ikanasin');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ikanasinMaster::orderBy('ta','desc')->get();
     $dataDetail = ikanasinDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('ikanasinMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = ikanasinMaster::where('id','=',$kodeEdit)->get();
     $dataChart = ikanasinMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/ikanasin/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_ikanasinMaster = ikanasinMaster::find($id);
     $update_ikanasinMaster->totalProduksi=$request->totalProduksi;
     $update_ikanasinMaster->totalLaut=$request->totalLaut;
     $update_ikanasinMaster->totalDarat=$request->totalDarat;
     $update_ikanasinMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlProduksi = 'jmlProduksi' . (string)$kodeD;
       $xjmlLaut = 'jmlLaut' . (string)$kodeD;
       $xjmlDarat= 'jmlDarat' . (string)$kodeD;
       $xjmlSawah = 'jmlSawah' . (string)$kodeD;
       $update_ikanasinDetail = ikanasinDetail::where([
                                                  ['ikanasinMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_ikanasinDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_ikanasinDetail->jmlLaut=$request->$xjmlLaut;
       $update_ikanasinDetail->jmlDarat=$request->$xjmlDarat;
       $update_ikanasinDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/ikanasin');
   }
   public function destroy($xdj)
    {
      $cMaster = ikanasinMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = ikanasinDetail::where('ikanasinMaster_id', $xdj)->delete();
      return redirect('/perikanan/ikanasin');
    }

    public function detail($id){
        $model = ikanasinMaster::where('ta', $id)->first();
        echo view('perikanan.ikanasin.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
