<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\nakertrans\nakerMaster;
use App\Models\nakertrans\nakerDetail;
use View;
use App\Models\kecamatan;

class nakerController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = nakerMaster::orderBy('ta','desc')->get();
    $dataChart = nakerMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/nakertrans/naker/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = nakerMaster::orderBy('ta','desc')->get();
     $dataChart = nakerMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/nakertrans/naker/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = nakerMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalPerusahaan' => $request->totalPerusahaan,
        'totalNaker' => $request->totalNaker,
        'totalNakerlaki' => $request->totalNakerlaki,
        'totalNakerperempuan' => $request->totalNakerperempuan,
      ]);

      $lastkdeKSD= DB::table('nakerMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlPerusahaan = 'jmlPerusahaan' . (string)$nomer;
        $xjmlNaker = 'jmlNaker' . (string)$nomer;
        $xjmlNakerlaki= 'jmlNakerlaki' . (string)$nomer;
        $xjmlNakerperempuan = 'jmlNakerperempuan' . (string)$nomer;
        $kodel= nakerDetail::create([
          'nakerMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlPerusahaan' => $request->$xjmlPerusahaan,
          'jmlNaker' => $request->$xjmlNaker,
          'jmlNakerlaki' => $request->$xjmlNakerlaki,
          'jmlNakerperempuan' => $request->$xjmlNakerperempuan,
        ]);
        $nomer ++;
      }
      return redirect('/nakertrans/naker');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = nakerMaster::orderBy('ta','desc')->get();
     $dataDetail = nakerDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('nakerMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = nakerMaster::where('id','=',$kodeEdit)->get();
     $dataChart = nakerMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/nakertrans/naker/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_nakerMaster = nakerMaster::find($id);
     $update_nakerMaster->totalPerusahaan=$request->totalPerusahaan;
     $update_nakerMaster->totalNaker=$request->totalNaker;
     $update_nakerMaster->totalNakerlaki=$request->totalNakerlaki;
     $update_nakerMaster->totalNakerperempuan=$request->totalNakerperempuan;
     $update_nakerMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlPerusahaan = 'jmlPerusahaan' . (string)$kodeD;
       $xjmlNaker = 'jmlNaker' . (string)$kodeD;
       $xjmlNakerlaki= 'jmlNakerlaki' . (string)$kodeD;
       $xjmlNakerperempuan = 'jmlNakerperempuan' . (string)$kodeD;
       $update_nakerDetail = nakerDetail::where([
                                                  ['nakerMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_nakerDetail->jmlPerusahaan=$request->$xjmlPerusahaan;
       $update_nakerDetail->jmlNaker=$request->$xjmlNaker;
       $update_nakerDetail->jmlNakerlaki=$request->$xjmlNakerlaki;
       $update_nakerDetail->jmlNakerperempuan=$request->$xjmlNakerperempuan;
       $update_nakerDetail->save();
       $kodeD ++;
     }
     return redirect('/nakertrans/naker');
   }
   public function destroy($xdj)
    {
      $cMaster = nakerMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = nakerDetail::where('nakerMaster_id', $xdj)->delete();
      return redirect('/nakertrans/naker');
    }
}
