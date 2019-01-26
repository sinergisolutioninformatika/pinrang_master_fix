<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\budidayaMaster;
use App\Models\perikanan\budidayaDetail;
use View;
use App\Models\kecamatan;

class budidayaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = budidayaMaster::orderBy('ta','desc')->get();
    $dataChart = budidayaMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/budidaya/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = budidayaMaster::orderBy('ta','desc')->get();
     $dataChart = budidayaMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/budidaya/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = budidayaMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalUsaha' => $request->totalUsaha,
        'totalTambak' => $request->totalTambak,
        'totalKolam' => $request->totalKolam,
        'totalSawah' => $request->totalSawah,
      ]);

      $lastkdeKSD= DB::table('budidayaMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlUsaha = 'jmlUsaha' . (string)$nomer;
        $xjmlTambak = 'jmlTambak' . (string)$nomer;
        $xjmlKolam= 'jmlKolam' . (string)$nomer;
        $xjmlSawah = 'jmlSawah' . (string)$nomer;
        $kodel= budidayaDetail::create([
          'budidayaMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlUsaha' => $request->$xjmlUsaha,
          'jmlTambak' => $request->$xjmlTambak,
          'jmlKolam' => $request->$xjmlKolam,
          'jmlSawah' => $request->$xjmlSawah,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/budidaya');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = budidayaMaster::orderBy('ta','desc')->get();
     $dataDetail = budidayaDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('budidayaMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = budidayaMaster::where('id','=',$kodeEdit)->get();
     $dataChart = budidayaMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/budidaya/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_budidayaMaster = budidayaMaster::find($id);
     $update_budidayaMaster->totalUsaha=$request->totalUsaha;
     $update_budidayaMaster->totalTambak=$request->totalTambak;
     $update_budidayaMaster->totalKolam=$request->totalKolam;
     $update_budidayaMaster->totalSawah=$request->totalSawah;
     $update_budidayaMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlUsaha = 'jmlUsaha' . (string)$kodeD;
       $xjmlTambak = 'jmlTambak' . (string)$kodeD;
       $xjmlKolam= 'jmlKolam' . (string)$kodeD;
       $xjmlSawah = 'jmlSawah' . (string)$kodeD;
       $update_budidayaDetail = budidayaDetail::where([
                                                  ['budidayaMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_budidayaDetail->jmlUsaha=$request->$xjmlUsaha;
       $update_budidayaDetail->jmlTambak=$request->$xjmlTambak;
       $update_budidayaDetail->jmlKolam=$request->$xjmlKolam;
       $update_budidayaDetail->jmlSawah=$request->$xjmlSawah;
       $update_budidayaDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/budidaya');
   }
   public function destroy($xdj)
    {
      $cMaster = budidayaMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = budidayaDetail::where('budidayaMaster_id', $xdj)->delete();
      return redirect('/perikanan/budidaya');
    }

    public function detail($id){
      $model = budidayaMaster::where('ta', $id)->first();
      echo view('perikanan.budidaya.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
