<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\siswaSMPMaster;
use App\Models\pendidikan\siswaSMPDetail;
use View;
use App\Models\kecamatan;

class siswaSMPController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = siswaSMPMaster::orderBy('ta','desc')->get();
    $dataChart = siswaSMPMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/siswaSMP/view',['dataA'=> $dataMaster,
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
     $dataMaster = siswaSMPMaster::orderBy('ta','desc')->get();
     $dataChart = siswaSMPMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaSMP/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = siswaSMPMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalSiswaSMP' => $request->totalSiswaSMP,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);

      $lastkdeKSMP= DB::table('siswaSMPMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSiswaSMP = 'jmlSiswaSMP' . (string)$nomer;
        $xjmlLaki = 'jmlLaki' . (string)$nomer;
        $xjmlPerempuan= 'jmlPerempuan' . (string)$nomer;
        $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$nomer;
        $kodel= siswaSMPDetail::create([
          'siswaSMPMaster_id' => $lastkdeKSMP->id,
          'kecamatan_id' => $kec->id,
          'jmlSiswaSMP' => $request->$xjmlSiswaSMP,
          'jmlLaki' => $request->$xjmlLaki,
          'jmlPerempuan' => $request->$xjmlPerempuan,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/siswaSMP');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = siswaSMPMaster::orderBy('ta','desc')->get();
     $dataDetail = siswaSMPDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('siswaSMPMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = siswaSMPMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaSMP/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_siswaSMPMaster = siswaSMPMaster::find($id);
     $update_siswaSMPMaster->totalSiswaSMP=$request->totalSiswaSMP;
     $update_siswaSMPMaster->totalLaki=$request->totalLaki;
     $update_siswaSMPMaster->totalPerempuan=$request->totalPerempuan;
     $update_siswaSMPMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSiswaSMP = 'jmlSiswaSMP' . (string)$kodeD;
       $xjmlLaki = 'jmlLaki' . (string)$kodeD;
       $xjmlPerempuan= 'jmlPerempuan' . (string)$kodeD;
       $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$kodeD;
       $update_siswaSMPDetail = siswaSMPDetail::where([
                                                  ['siswaSMPMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_siswaSMPDetail->jmlSiswaSMP=$request->$xjmlSiswaSMP;
       $update_siswaSMPDetail->jmlLaki=$request->$xjmlLaki;
       $update_siswaSMPDetail->jmlPerempuan=$request->$xjmlPerempuan;
       $update_siswaSMPDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/siswaSMP');
   }
   public function destroy($xdj)
    {
      $cMaster = siswaSMPMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = siswaSMPDetail::where('siswaSMPMaster_id', $xdj)->delete();
      return redirect('/pendidikan/siswaSMP');
    }

    public function detail($id){
      $model = siswaSMPMaster::where('ta', $id)->first();
      return view('pendidikan.siswaSMP.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
