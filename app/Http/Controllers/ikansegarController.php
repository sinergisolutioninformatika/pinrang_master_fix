<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\ikansegarMaster;
use App\Models\perikanan\ikansegarDetail;
use View;
use App\Models\kecamatan;

class ikansegarController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = ikansegarMaster::orderBy('ta','desc')->get();
    $dataChart = ikansegarMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/ikansegar/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = ikansegarMaster::orderBy('ta','desc')->get();
     $dataChart = ikansegarMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/ikansegar/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = ikansegarMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalProduksi' => $request->totalProduksi,
        'totalTambak' => $request->totalTambak,
        'totalKolam' => $request->totalKolam,
        'totalSawah' => $request->totalSawah,
      ]);

      $lastkdeKSD= DB::table('ikansegarMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlProduksi = 'jmlProduksi' . (string)$nomer;
        $xjmlTambak = 'jmlTambak' . (string)$nomer;
        $xjmlKolam= 'jmlKolam' . (string)$nomer;
        $xjmlSawah = 'jmlSawah' . (string)$nomer;
        $kodel= ikansegarDetail::create([
          'ikansegarMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlProduksi' => $request->$xjmlProduksi,
          'jmlTambak' => $request->$xjmlTambak,
          'jmlKolam' => $request->$xjmlKolam,
          'jmlSawah' => $request->$xjmlSawah,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/ikansegar');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = ikansegarMaster::orderBy('ta','desc')->get();
     $dataDetail = ikansegarDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('ikansegarMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = ikansegarMaster::where('id','=',$kodeEdit)->get();
     $dataChart = ikansegarMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/ikansegar/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_ikansegarMaster = ikansegarMaster::find($id);
     $update_ikansegarMaster->totalProduksi=$request->totalProduksi;
     $update_ikansegarMaster->totalTambak=$request->totalTambak;
     $update_ikansegarMaster->totalKolam=$request->totalKolam;
     $update_ikansegarMaster->totalSawah=$request->totalSawah;
     $update_ikansegarMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlProduksi = 'jmlProduksi' . (string)$kodeD;
       $xjmlTambak = 'jmlTambak' . (string)$kodeD;
       $xjmlKolam= 'jmlKolam' . (string)$kodeD;
       $xjmlSawah = 'jmlSawah' . (string)$kodeD;
       $update_ikansegarDetail = ikansegarDetail::where([
                                                  ['ikansegarMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_ikansegarDetail->jmlProduksi=$request->$xjmlProduksi;
       $update_ikansegarDetail->jmlTambak=$request->$xjmlTambak;
       $update_ikansegarDetail->jmlKolam=$request->$xjmlKolam;
       $update_ikansegarDetail->jmlSawah=$request->$xjmlSawah;
       $update_ikansegarDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/ikansegar');
   }
   public function destroy($xdj)
    {
      $cMaster = ikansegarMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = ikansegarDetail::where('ikansegarMaster_id', $xdj)->delete();
      return redirect('/perikanan/ikansegar');
    }

    public function detail($id){
        $model = ikansegarMaster::where('ta', $id)->first();
        echo view('perikanan.ikansegar.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
