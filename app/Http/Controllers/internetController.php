<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kominfo\internetMaster;
use App\Models\kominfo\internetDetail;
use View;
use App\Models\kecamatan;

class internetController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = internetMaster::orderBy('ta','desc')->get();
    $dataChart = internetMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/kominfo/internet/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = internetMaster::orderBy('ta','desc')->get();
     $dataChart = internetMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/internet/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = internetMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalDesaterlayani' => $request->totalDesaterlayani,
        'totalDesabelumterlayani' => $request->totalDesabelumterlayani,
      ]);

      $lastkdeKSD= DB::table('internetMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$nomer;
        $xjmlDesabelumterlayani = 'jmlDesabelumterlayani' . (string)$nomer;
        $kodel= internetDetail::create([
          'internetMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlDesaterlayani' => $request->$xjmlDesaterlayani,
          'jmlDesabelumterlayani' => $request->$xjmlDesabelumterlayani,
        ]);
        $nomer ++;
      }
      return redirect('/kominfo/internet');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = internetMaster::orderBy('ta','desc')->get();
     $dataDetail = internetDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('internetMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = internetMaster::where('id','=',$kodeEdit)->get();
     $dataChart = internetMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/kominfo/internet/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_internetMaster = internetMaster::find($id);
     $update_internetMaster->totalDesaterlayani=$request->totalDesaterlayani;
     $update_internetMaster->totalDesabelumterlayani=$request->totalDesabelumterlayani;
     $update_internetMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlDesaterlayani = 'jmlDesaterlayani' . (string)$kodeD;
       $xjmlDesabelumterlayani = 'jmlDesabelumterlayani' . (string)$kodeD;
       $xjmlKolam= 'jmlKolam' . (string)$kodeD;
       $xjmlSawah = 'jmlSawah' . (string)$kodeD;
       $update_internetDetail = internetDetail::where([
                                                  ['internetMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_internetDetail->jmlDesaterlayani=$request->$xjmlDesaterlayani;
       $update_internetDetail->jmlDesabelumterlayani=$request->$xjmlDesabelumterlayani;
       $update_internetDetail->save();
       $kodeD ++;
     }
     return redirect('/kominfo/internet');
   }
   public function destroy($xdj)
    {
      $cMaster = internetMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = internetDetail::where('internetMaster_id', $xdj)->delete();
      return redirect('/kominfo/internet');
    }

    public function detail($id){
        $model = internetMaster::where('ta',$id)->first();
        echo view('kominfo.internet.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}





