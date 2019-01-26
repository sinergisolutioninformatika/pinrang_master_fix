<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\guruSertifikatMaster;
use App\Models\pendidikan\guruSertifikatDetail;
use View;
use App\Models\kecamatan;

class guruSertifikatController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = guruSertifikatMaster::orderBy('ta','desc')->get();
    $dataChart = guruSertifikatMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/guruSertifikat/view',['dataA'=> $dataMaster,
                                              'dataC'=> $dataChart,
                                          'kecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = guruSertifikatMaster::orderBy('ta','desc')->get();
     $dataChart = guruSertifikatMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruSertifikat/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = guruSertifikatMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalGuruSertifikat' => $request->totalGuruSertifikat,
        'totalGuruTKSertifikat' => $request->totalGuruTKSertifikat,
        'totalGuruSDSertifikat' => $request->totalGuruSDSertifikat,
        'totalGuruSMPSertifikat' => $request->totalGuruSMPSertifikat,
      ]);

      $lastkdeKSD= DB::table('guruSertifikatMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlGuruSertifikat = 'jmlGuruSertifikat' . (string)$nomer;
        $xjmlGuruTKSertifikat = 'jmlGuruTKSertifikat' . (string)$nomer;
        $xjmlGuruSDSertifikat= 'jmlGuruSDSertifikat' . (string)$nomer;
        $xjmlGuruSMPSertifikat = 'jmlGuruSMPSertifikat' . (string)$nomer;
        $kodel= guruSertifikatDetail::create([
          'guruSertifikatMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlGuruSertifikat' => $request->$xjmlGuruSertifikat,
          'jmlGuruTKSertifikat' => $request->$xjmlGuruTKSertifikat,
          'jmlGuruSDSertifikat' => $request->$xjmlGuruSDSertifikat,
          'jmlGuruSMPSertifikat' => $request->$xjmlGuruSMPSertifikat,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/guruSertifikat');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = guruSertifikatMaster::orderBy('ta','desc')->get();
     $dataDetail = guruSertifikatDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('guruSertifikatMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = guruSertifikatMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruSertifikat/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_guruSertifikatMaster = guruSertifikatMaster::find($id);
     $update_guruSertifikatMaster->totalGuruSertifikat=$request->totalGuruSertifikat;
     $update_guruSertifikatMaster->totalGuruTKSertifikat=$request->totalGuruTKSertifikat;
     $update_guruSertifikatMaster->totalGuruSDSertifikat=$request->totalGuruSDSertifikat;
     $update_guruSertifikatMaster->totalGuruSMPSertifikat=$request->totalGuruSMPSertifikat;
     $update_guruSertifikatMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlGuruSertifikat = 'jmlGuruSertifikat' . (string)$kodeD;
       $xjmlGuruTKSertifikat = 'jmlGuruTKSertifikat' . (string)$kodeD;
       $xjmlGuruSDSertifikat= 'jmlGuruSDSertifikat' . (string)$kodeD;
       $xjmlGuruSMPSertifikat = 'jmlGuruSMPSertifikat' . (string)$kodeD;
       $update_guruSertifikatDetail = guruSertifikatDetail::where([
                                                  ['guruSertifikatMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_guruSertifikatDetail->jmlGuruSertifikat=$request->$xjmlGuruSertifikat;
       $update_guruSertifikatDetail->jmlGuruTKSertifikat=$request->$xjmlGuruTKSertifikat;
       $update_guruSertifikatDetail->jmlGuruSDSertifikat=$request->$xjmlGuruSDSertifikat;
       $update_guruSertifikatDetail->jmlGuruSMPSertifikat=$request->$xjmlGuruSMPSertifikat;
       $update_guruSertifikatDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/guruSertifikat');
   }
   public function destroy($xdj)
    {
      $cMaster = guruSertifikatMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = guruSertifikatDetail::where('guruSertifikatMaster_id', $xdj)->delete();
      return redirect('/pendidikan/guruSertifikat');
    }
    public function detail($id){
      $model = guruSertifikatMaster::where('ta',$id)->first();
      echo view('pendidikan.guruSertifikat.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
