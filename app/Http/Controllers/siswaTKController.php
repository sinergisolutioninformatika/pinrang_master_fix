<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\siswaTKMaster;
use App\Models\pendidikan\siswaTKDetail;
use View;
use App\Models\kecamatan;

class siswaTKController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = siswaTKMaster::orderBy('ta','desc')->get();
    $dataChart = siswaTKMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/siswaTK/view',['dataA'=> $dataMaster,
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
     $dataMaster = siswaTKMaster::orderBy('ta','desc')->get();
     $dataChart = siswaTKMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaTK/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = siswaTKMaster::create([
        'ta' => $request->session()->get('thn_anggaran'),
        'totalSiswaTK' => $request->totalSiswaTK,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);

      $lastkdeKTK= DB::table('siswaTKMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSiswaTK = 'jmlSiswaTK' . (string)$nomer;
        $xjmlLaki = 'jmlLaki' . (string)$nomer;
        $xjmlPerempuan= 'jmlPerempuan' . (string)$nomer;
        $xjmlGuruTKHonor = 'jmlGuruTKHonor' . (string)$nomer;
        $kodel= siswaTKDetail::create([
          'siswaTKMaster_id' => $lastkdeKTK->id,
          'kecamatan_id' => $kec->id,
          'jmlSiswaTK' => $request->$xjmlSiswaTK,
          'jmlLaki' => $request->$xjmlLaki,
          'jmlPerempuan' => $request->$xjmlPerempuan,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/siswaTK');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = siswaTKMaster::orderBy('ta','desc')->get();
     $dataDetail = siswaTKDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('siswaTKMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = siswaTKMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaTK/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_siswaTKMaster = siswaTKMaster::find($id);
     $update_siswaTKMaster->totalSiswaTK=$request->totalSiswaTK;
     $update_siswaTKMaster->totalLaki=$request->totalLaki;
     $update_siswaTKMaster->totalPerempuan=$request->totalPerempuan;
     $update_siswaTKMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSiswaTK = 'jmlSiswaTK' . (string)$kodeD;
       $xjmlLaki = 'jmlLaki' . (string)$kodeD;
       $xjmlPerempuan= 'jmlPerempuan' . (string)$kodeD;
       $xjmlGuruTKHonor = 'jmlGuruTKHonor' . (string)$kodeD;
       $update_siswaTKDetail = siswaTKDetail::where([
                                                  ['siswaTKMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_siswaTKDetail->jmlSiswaTK=$request->$xjmlSiswaTK;
       $update_siswaTKDetail->jmlLaki=$request->$xjmlLaki;
       $update_siswaTKDetail->jmlPerempuan=$request->$xjmlPerempuan;
       $update_siswaTKDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/siswaTK');
   }
   public function destroy($xdj)
    {
      $cMaster = siswaTKMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = siswaTKDetail::where('siswaTKMaster_id', $xdj)->delete();
      return redirect('/pendidikan/siswaTK');
    }

    public function detail($id){
      $model = siswaTKMaster::where('ta', $id)->first();
      return view('pendidikan.siswaTK.detail',['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
