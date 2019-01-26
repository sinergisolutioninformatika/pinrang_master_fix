<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pupr\pemukimanMaster;
use App\Models\pupr\pemukimanDetail;
use View;
use App\Models\kecamatan;

class pemukimanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = pemukimanMaster::orderBy('ta','desc')->get();
    $dataChart = pemukimanMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/pupr/pemukiman/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = pemukimanMaster::orderBy('ta','desc')->get();
     $dataChart = pemukimanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/pemukiman/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = pemukimanMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalLuas' => $request->totalLuas,
      ]);

      $lastkdeKSD= DB::table('pemukimanMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlLuas = 'jmlLuas' . (string)$nomer;
        $kodel= pemukimanDetail::create([
          'pemukimanMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlLuas' => $request->$xjmlLuas,
        ]);
        $nomer ++;
      }
      return redirect('/pupr/pemukiman');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = pemukimanMaster::orderBy('ta','desc')->get();
     $dataDetail = pemukimanDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('pemukimanMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = pemukimanMaster::where('id','=',$kodeEdit)->get();
     $dataChart = pemukimanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/pupr/pemukiman/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_pemukimanMaster = pemukimanMaster::find($id);
     $update_pemukimanMaster->totalLuas=$request->totalLuas;
     $update_pemukimanMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlLuas = 'jmlLuas' . (string)$kodeD;
       $update_pemukimanDetail = pemukimanDetail::where([
                                                  ['pemukimanMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_pemukimanDetail->jmlLuas=$request->$xjmlLuas;
       $update_pemukimanDetail->save();
       $kodeD ++;
     }
     return redirect('/pupr/pemukiman');
   }
   public function destroy($xdj)
    {
      $cMaster = pemukimanMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = pemukimanDetail::where('pemukimanMaster_id', $xdj)->delete();
      return redirect('/pupr/pemukiman');
    }

    public function detail($id)
    {
      $model = pemukimanMaster::where('ta',$id)->first();

      echo view('pupr.pemukiman.detail',['ta' => $id, 'data' => $model, 'no' => 1]);
    }
}
