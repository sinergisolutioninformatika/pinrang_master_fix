<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pupr\airlimbahMaster;
use App\Models\pupr\airlimbahDetail;
use View;
use App\Models\kecamatan;

class airlimbahController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = airlimbahMaster::orderBy('ta','desc')->get();
    $dataChart = airlimbahMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pupr/airlimbah/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = airlimbahMaster::orderBy('ta','desc')->get();
     $dataChart = airlimbahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/airlimbah/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {

     $dataKecamatan = kecamatan::all();
 
     $kondi = airlimbahMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalUnit' => $request->totalUnit,
      ]);

      $lastkdeKSD= DB::table('airlimbahMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlUnit = 'jmlUnit' . (string)$nomer;
        $kodel= airlimbahDetail::create([
          'airlimbahMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlUnit' => $request->$xjmlUnit,
        ]);
        $nomer ++;
      }
      return redirect('/pupr/airlimbah/');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = airlimbahMaster::orderBy('ta','desc')->get();
     $dataDetail = airlimbahDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('airlimbahMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = airlimbahMaster::where('id','=',$kodeEdit)->get();
     $dataChart = airlimbahMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/airlimbah/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_airlimbahMaster = airlimbahMaster::find($id);
     $update_airlimbahMaster->totalUnit=$request->totalUnit;
     $update_airlimbahMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlUnit = 'jmlUnit' . (string)$kodeD;
       $update_airlimbahDetail = airlimbahDetail::where([
                                                  ['airlimbahMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_airlimbahDetail->jmlUnit=$request->$xjmlUnit;
       $update_airlimbahDetail->save();
       $kodeD ++;
     }
     return redirect('/pupr/airlimbah');
   }
   public function destroy($xdj)
    {
      $cMaster = airlimbahMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = airlimbahDetail::where('airlimbahMaster_id', $xdj)->delete();
      return redirect('/pupr/airlimbah');
    }

    public function detail($id){
      $model = airlimbahMaster::where('ta',$id)->first();
      echo view('pupr.airlimbah.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
