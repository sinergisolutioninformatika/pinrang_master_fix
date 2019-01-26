<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\guruHonorMaster;
use App\Models\pendidikan\guruHonorDetail;
use View;
use App\Models\kecamatan;

class guruHonorController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = guruHonorMaster::orderBy('ta','desc')->get();
    $dataChart = guruHonorMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/guruHonor/view',['dataA'=> $dataMaster,
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
     $dataMaster = guruHonorMaster::orderBy('ta','desc')->get();
     $dataChart = guruHonorMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruHonor/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = guruHonorMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalGuruHonor' => $request->totalGuruHonor,
        'totalGuruTKHonor' => $request->totalGuruTKHonor,
        'totalGuruSDHonor' => $request->totalGuruSDHonor,
        'totalGuruSMPHonor' => $request->totalGuruSMPHonor,
      ]);

      $lastkdeKSD= DB::table('guruHonorMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlGuruHonor = 'jmlGuruHonor' . (string)$nomer;
        $xjmlGuruTKHonor = 'jmlGuruTKHonor' . (string)$nomer;
        $xjmlGuruSDHonor= 'jmlGuruSDHonor' . (string)$nomer;
        $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$nomer;
        $kodel= guruHonorDetail::create([
          'guruHonorMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlGuruHonor' => $request->$xjmlGuruHonor,
          'jmlGuruTKHonor' => $request->$xjmlGuruTKHonor,
          'jmlGuruSDHonor' => $request->$xjmlGuruSDHonor,
          'jmlGuruSMPHonor' => $request->$xjmlGuruSMPHonor,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/guruHonor');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = guruHonorMaster::orderBy('ta','desc')->get();
     $dataDetail = guruHonorDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('guruHonorMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = guruHonorMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/guruHonor/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_guruHonorMaster = guruHonorMaster::find($id);
     $update_guruHonorMaster->totalGuruHonor=$request->totalGuruHonor;
     $update_guruHonorMaster->totalGuruTKHonor=$request->totalGuruTKHonor;
     $update_guruHonorMaster->totalGuruSDHonor=$request->totalGuruSDHonor;
     $update_guruHonorMaster->totalGuruSMPHonor=$request->totalGuruSMPHonor;
     $update_guruHonorMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlGuruHonor = 'jmlGuruHonor' . (string)$kodeD;
       $xjmlGuruTKHonor = 'jmlGuruTKHonor' . (string)$kodeD;
       $xjmlGuruSDHonor= 'jmlGuruSDHonor' . (string)$kodeD;
       $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$kodeD;
       $update_guruHonorDetail = guruHonorDetail::where([
                                                  ['guruHonorMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_guruHonorDetail->jmlGuruHonor=$request->$xjmlGuruHonor;
       $update_guruHonorDetail->jmlGuruTKHonor=$request->$xjmlGuruTKHonor;
       $update_guruHonorDetail->jmlGuruSDHonor=$request->$xjmlGuruSDHonor;
       $update_guruHonorDetail->jmlGuruSMPHonor=$request->$xjmlGuruSMPHonor;
       $update_guruHonorDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/guruHonor');
   }
   public function destroy($xdj)
    {
      $cMaster = guruHonorMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = guruHonorDetail::where('guruHonorMaster_id', $xdj)->delete();
      return redirect('/pendidikan/guruHonor');
    }

    public function detail($id){
      $model = guruHonorMaster::where('ta',$id)->first();
      echo view('pendidikan.guruHonor.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }

}









