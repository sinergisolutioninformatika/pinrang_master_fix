<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\lingkungan\spplMaster;
use App\Models\lingkungan\spplDetail;
use View;
use App\Models\kecamatan;

class spplController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = spplMaster::orderBy('ta','desc')->get();
    $dataChart = spplMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/lingkungan/sppl/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataKecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = spplMaster::orderBy('ta','desc')->get();
     $dataChart = spplMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/lingkungan/sppl/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = spplMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'bln' => $request->bln,
        'totalSurat' => $request->totalSurat,
      ]);

      $lastid= DB::table('spplMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSurat = 'jmlSurat' . (string)$nomer;
        $kodel= spplDetail::create([
          'spplMaster_id' => $lastid->id,
          'kecamatan_id' => $kec->id,
          'jmlSurat' => $request->$xjmlSurat,
        ]);
        $nomer ++;
      }
      return redirect('/lingkungan/sppl');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = spplMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = spplMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = spplDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('spplMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = spplMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = kecamatan::all();
     return view('/lingkungan/sppl/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_spplMaster = spplMaster::find($id);
     $update_spplMaster->bln=$request->bln;
     $update_spplMaster->totalSurat=$request->totalSurat;
     $update_spplMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSurat = 'jmlSurat' . (string)$kodeD;
       $update_spplDetail = spplDetail::where([
                                                  ['spplMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_spplDetail->jmlSurat=$request->$xjmlSurat;
       $update_spplDetail->save();
       $kodeD ++;
     }
     return redirect('/lingkungan/sppl');
   }
   public function destroy($xdj)
    {
      $cMaster = spplMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = spplDetail::where('spplMaster_id', $xdj)->delete();
      return redirect('/lingkungan/sppl');
    }

    public function detail($id){
      $model = spplMaster::where('bln', $id)->first();
      // var_dump($model->spplDetail);
      echo view('lingkungan.sppl.detail', ['ta' => $id, 'data'=>$model, 'no'=>1]);

  }
}
