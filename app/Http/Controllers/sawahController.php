<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pertanian\sawahMaster;
use App\Models\pertanian\sawahDetail;
use View;
use App\Models\kecamatan;

class sawahController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = sawahMaster::orderBy('ta','desc')->get();
    $dataChart = sawahMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pertanian/sawah/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = sawahMaster::orderBy('ta','desc')->get();
     $dataChart = sawahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/sawah/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = sawahMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalLuas' => $request->totalLuas,
      ]);

      $lastkdeKSD= DB::table('sawahMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlLuas = 'jmlLuas' . (string)$nomer;
           $kodel = sawahDetail::create([
          'sawahMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlLuas' => $request->$xjmlLuas,
        ]);
        $nomer ++;
      }
      return redirect('/pertanian/sawah');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = sawahMaster::orderBy('ta','desc')->get();
     $dataDetail = sawahDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('sawahMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = sawahMaster::where('id','=',$kodeEdit)->get();
     $dataChart = sawahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pertanian/sawah/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_sawahMaster = sawahMaster::find($id);
     $update_sawahMaster->totalLuas=$request->totalLuas;
     $update_sawahMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlLuas = 'jmlLuas' . (string)$kodeD;
       $update_sawahDetail = sawahDetail::where([
                                                  ['sawahMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_sawahDetail->jmlLuas=$request->$xjmlLuas;
       $update_sawahDetail->save();
       $kodeD ++;
     }
     return redirect('/pertanian/sawah');
   }
   public function destroy($xdj)
    {
      $cMaster = sawahMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = sawahDetail::where('sawahMaster_id', $xdj)->delete();
      return redirect('/pertanian/sawah');
    }

    public function detail($id)
    {
      $model = sawahMaster::where('ta',$id)->first();
      echo view('pertanian.sawah.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
