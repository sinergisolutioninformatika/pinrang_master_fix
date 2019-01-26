<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\produksiikanMaster;
use App\Models\perikanan\produksiikanDetail;
use View;
use App\Models\kecamatan;

class produksiikanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = produksiikanMaster::orderBy('ta','desc')->get();
    $dataChart = produksiikanMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/produksiikan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = produksiikanMaster::orderBy('ta','desc')->get();
     $dataChart = produksiikanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/produksiikan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = produksiikanMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalProduksi' => $request->totalProduksi,
        'totalLaut' => $request->totalLaut,
        'totalRawa' => $request->totalRawa,
        'totalSungai' => $request->totalSungai,
        'totalWaduk' => $request->totalWaduk,
      ]);

      $lastkdeKSD= DB::table('produksiikanMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlProduksi = 'jmlProduksi' . (string)$nomer;
        $xjmlLaut = 'jmlLaut' . (string)$nomer;
        $xjmlRawa= 'jmlRawa' . (string)$nomer;
        $xjmlSungai = 'jmlSungai' . (string)$nomer;
        $xjmlWaduk = 'jmlWaduk' . (string)$nomer;
        $kodel= produksiikanDetail::create([
          'produksiikanMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlLaut' => $request->$xjmlLaut,
          'jmlRawa' => $request->$xjmlRawa,
          'jmlSungai' => $request->$xjmlSungai,
          'jmlWaduk' => $request->$xjmlWaduk,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/produksiikan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = produksiikanMaster::orderBy('ta','desc')->get();
     $dataDetail = produksiikanDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('produksiikanMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = produksiikanMaster::where('id','=',$kodeEdit)->get();
     $dataChart = produksiikanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/produksiikan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_produksiikanMaster = produksiikanMaster::find($id);
     $update_produksiikanMaster->totalProduksi=$request->totalProduksi;
     $update_produksiikanMaster->totalLaut=$request->totalLaut;
     $update_produksiikanMaster->totalRawa=$request->totalRawa;
     $update_produksiikanMaster->totalSungai=$request->totalSungai;
     $update_produksiikanMaster->totalWaduk=$request->totalWaduk;
     $update_produksiikanMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlProduksi = 'jmlProduksi' . (string)$kodeD;
       $xjmlLaut = 'jmlLaut' . (string)$kodeD;
       $xjmlRawa= 'jmlRawa' . (string)$kodeD;
       $xjmlSungai = 'jmlSungai' . (string)$kodeD;
       $xjmlWaduk = 'jmlWaduk' . (string)$kodeD;
       $xjmlPetanitambak = 'jmlPetanitambak' . (string)$kodeD;
       $update_produksiikanDetail = produksiikanDetail::where([
                                                  ['produksiikanMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_produksiikanDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_produksiikanDetail->jmlLaut=$request->$xjmlLaut;
       $update_produksiikanDetail->jmlRawa=$request->$xjmlRawa;
       $update_produksiikanDetail->jmlSungai=$request->$xjmlSungai;
       $update_produksiikanDetail->jmlWaduk=$request->$xjmlWaduk;
       $update_produksiikanDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/produksiikan');
   }
   public function destroy($xdj)
    {
      $cMaster = produksiikanMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = produksiikanDetail::where('produksiikanMaster_id', $xdj)->delete();
      return redirect('/perikanan/produksiikan');
    }

    public function detail($id){
      $model = produksiikanMaster::where('ta', $id)->first();
      echo view('perikanan.produksiikan.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
