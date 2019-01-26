<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\guruPNSMaster;
use App\Models\pendidikan\guruPNSDetail;
use View;
use App\Models\kecamatan;

class guruPNSController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = guruPNSMaster::orderBy('ta','desc')->get();
    $dataChart = guruPNSMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/guruPNS/view',['dataA'=> $dataMaster,
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
     $dataMaster = guruPNSMaster::orderBy('ta','desc')->get();
     $dataChart = guruPNSMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruPNS/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = guruPNSMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalGuruPNS' => $request->totalGuruPNS,
        'totalGuruTKPNS' => $request->totalGuruTKPNS,
        'totalGuruSDPNS' => $request->totalGuruSDPNS,
        'totalGuruSMPPNS' => $request->totalGuruSMPPNS,
      ]);

      $lastkdeKSD= DB::table('guruPNSMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlGuruPNS = 'jmlGuruPNS' . (string)$nomer;
        $xjmlGuruTKPNS = 'jmlGuruTKPNS' . (string)$nomer;
        $xjmlGuruSDPNS= 'jmlGuruSDPNS' . (string)$nomer;
        $xjmlGuruSMPPNS = 'jmlGuruSMPPNS' . (string)$nomer;
        $kodel= guruPNSDetail::create([
          'guruPNSMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlGuruPNS' => $request->$xjmlGuruPNS,
          'jmlGuruTKPNS' => $request->$xjmlGuruTKPNS,
          'jmlGuruSDPNS' => $request->$xjmlGuruSDPNS,
          'jmlGuruSMPPNS' => $request->$xjmlGuruSMPPNS,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/guruPNS');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = guruPNSMaster::orderBy('ta','desc')->get();
     $dataDetail = guruPNSDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('guruPNSMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = guruPNSMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruPNS/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_guruPNSMaster = guruPNSMaster::find($id);
     $update_guruPNSMaster->totalGuruPNS=$request->totalGuruPNS;
     $update_guruPNSMaster->totalGuruTKPNS=$request->totalGuruTKPNS;
     $update_guruPNSMaster->totalGuruSDPNS=$request->totalGuruSDPNS;
     $update_guruPNSMaster->totalGuruSMPPNS=$request->totalGuruSMPPNS;
     $update_guruPNSMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlGuruPNS = 'jmlGuruPNS' . (string)$kodeD;
       $xjmlGuruTKPNS = 'jmlGuruTKPNS' . (string)$kodeD;
       $xjmlGuruSDPNS= 'jmlGuruSDPNS' . (string)$kodeD;
       $xjmlGuruSMPPNS = 'jmlGuruSMPPNS' . (string)$kodeD;
       $update_guruPNSDetail = guruPNSDetail::where([
                                                  ['guruPNSMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_guruPNSDetail->jmlGuruPNS=$request->$xjmlGuruPNS;
       $update_guruPNSDetail->jmlGuruTKPNS=$request->$xjmlGuruTKPNS;
       $update_guruPNSDetail->jmlGuruSDPNS=$request->$xjmlGuruSDPNS;
       $update_guruPNSDetail->jmlGuruSMPPNS=$request->$xjmlGuruSMPPNS;
       $update_guruPNSDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/guruPNS');
   }
   public function destroy($xdj)
    {
      $cMaster = guruPNSMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = guruPNSDetail::where('guruPNSMaster_id', $xdj)->delete();
      return redirect('/pendidikan/guruPNS');
    }

    public function detail($id){
      $model = guruPNSMaster::where('ta',$id)->first();
      echo view('pendidikan.guruPNS.detail',['ta' => $id, 'data'=>$model, 'no'=>1]);
    }
}




