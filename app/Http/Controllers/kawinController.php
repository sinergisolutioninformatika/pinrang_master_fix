<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kependudukan\kawinMaster;
use App\Models\kependudukan\kawinDetail;
use View;
use App\Models\kecamatan;

class kawinController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kawinMaster::orderBy('ta','desc')->get();
    $dataChart = kawinMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/kependudukan/kawin/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kawinMaster::orderBy('ta','desc')->get();
     $dataChart = kawinMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kawin/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kawinMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalKawin' => $request->totalKawin,
        'totalCerai' => $request->totalCerai,
      ]);

      $lastid= DB::table('kawinMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlKawin = 'jmlKawin' . (string)$nomer;
        $xjmlCerai = 'jmlCerai' . (string)$nomer;
        $kodel= kawinDetail::create([
          'kawinMaster_id' => $lastid->id,
          'kecamatan_id' => $kec->id,
          'jmlKawin' => $request->$xjmlKawin,
          'jmlCerai' => $request->$xjmlCerai,
        ]);
        $nomer ++;
      }
      return redirect('/kependudukan/kawin');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kawinMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = kawinMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = kawinDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kawinMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kawinMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kawin/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kawinMaster = kawinMaster::find($id);
     $update_kawinMaster->bln=$request->bln;
     $update_kawinMaster->totalKawin=$request->totalKawin;
     $update_kawinMaster->totalCerai=$request->totalCerai;
     $update_kawinMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlKawin = 'jmlKawin' . (string)$kodeD;
       $xjmlCerai = 'jmlCerai' . (string)$kodeD;
       $update_kawinDetail = kawinDetail::where([
                                                  ['kawinMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kawinDetail->jmlKawin=$request->$xjmlKawin;
       $update_kawinDetail->jmlCerai=$request->$xjmlCerai;
       $update_kawinDetail->save();
       $kodeD ++;
     }
     return redirect('/kependudukan/kawin');
   }
   public function destroy($xdj)
    {
      $cMaster = kawinMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kawinDetail::where('kawinMaster_id', $xdj)->delete();
      return redirect('/kependudukan/kawin');
    }

    public function detail($id){
      $model = kawinMaster::where('ta',$id)->first();

      echo view('kependudukan.kawin.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
