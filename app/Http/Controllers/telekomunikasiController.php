<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kominfo\telekomunikasiMaster;
use App\Models\kominfo\telekomunikasiDetail;
use View;
use App\Models\kecamatan;

class telekomunikasiController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = telekomunikasiMaster::orderBy('ta','desc')->get();
    $dataChart = telekomunikasiMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/kominfo/telekomunikasi/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = telekomunikasiMaster::orderBy('ta','desc')->get();
     $dataChart = telekomunikasiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/telekomunikasi/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = telekomunikasiMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalDesaterlayani' => $request->totalDesaterlayani,
        'totalDesabelumterlayani' => $request->totalDesabelumterlayani,
        'totalBTS' => $request->totalBTS,
      ]);

      $lastkdeKSD= DB::table('telekomunikasiMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$nomer;
        $xjmlDesabelumterlayani = 'jmlDesabelumterlayani' . (string)$nomer;
        $xjmlBTS = 'jmlBTS' . (string)$nomer;
        $kodel= telekomunikasiDetail::create([
          'telekomunikasiMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlDesaterlayani' => $request->$xjmlDesaterlayani,
          'jmlDesabelumterlayani' => $request->$xjmlDesabelumterlayani,
          'jmlBTS' => $request->$xjmlBTS,
        ]);
        $nomer ++;
      }
      return redirect('/kominfo/telekomunikasi');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = telekomunikasiMaster::orderBy('ta','desc')->get();
     $dataDetail = telekomunikasiDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('telekomunikasiMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = telekomunikasiMaster::where('id','=',$kodeEdit)->get();
     $dataChart = telekomunikasiMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/telekomunikasi/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_telekomunikasiMaster = telekomunikasiMaster::find($id);
     $update_telekomunikasiMaster->totalDesaterlayani=$request->totalDesaterlayani;
     $update_telekomunikasiMaster->totalDesabelumterlayani=$request->totalDesabelumterlayani;
     $update_telekomunikasiMaster->totalBTS=$request->totalBTS;
     $update_telekomunikasiMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$kodeD;
       $xjmlDesabelumterlayani = 'jmlDesabelumterlayani' . (string)$kodeD;
       $xjmlBTS = 'jmlBTS' . (string)$kodeD;
       $update_telekomunikasiDetail = telekomunikasiDetail::where([
                                                  ['telekomunikasiMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_telekomunikasiDetail->jmlDesaterlayani=$request->$xjmlDesaterlayani;
       $update_telekomunikasiDetail->jmlDesabelumterlayani=$request->$xjmlDesabelumterlayani;
       $update_telekomunikasiDetail->jmlBTS=$request->$xjmlBTS;
       $update_telekomunikasiDetail->save();
       $kodeD ++;
     }
     return redirect('/kominfo/telekomunikasi');
   }
   public function destroy($xdj)
    {
      $cMaster = telekomunikasiMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = telekomunikasiDetail::where('telekomunikasiMaster_id', $xdj)->delete();
      return redirect('/kominfo/telekomunikasi');
    }
}
