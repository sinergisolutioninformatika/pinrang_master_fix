<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\siswaSDMaster;
use App\Models\pendidikan\siswaSDDetail;
use View;
use App\Models\kecamatan;

class siswaSDController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = siswaSDMaster::orderBy('ta','desc')->get();
    $dataChart = siswaSDMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/siswaSD/view',['dataA'=> $dataMaster,
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
     $dataMaster = siswaSDMaster::orderBy('ta','desc')->get();
     $dataChart = siswaSDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaSD/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = siswaSDMaster::create([
        'ta' => $request->session()->get('thn_anggaran'),
        'totalSiswaSD' => $request->totalSiswaSD,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);

      $lastkdeKSD= DB::table('siswaSDMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSiswaSD = 'jmlSiswaSD' . (string)$nomer;
        $xjmlLaki = 'jmlLaki' . (string)$nomer;
        $xjmlPerempuan= 'jmlPerempuan' . (string)$nomer;
        $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$nomer;
        $kodel= siswaSDDetail::create([
          'siswaSDMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlSiswaSD' => $request->$xjmlSiswaSD,
          'jmlLaki' => $request->$xjmlLaki,
          'jmlPerempuan' => $request->$xjmlPerempuan,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/siswaSD');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = siswaSDMaster::orderBy('ta','desc')->get();
     $dataDetail = siswaSDDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('siswaSDMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = siswaSDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/siswaSD/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_siswaSDMaster = siswaSDMaster::find($id);
     $update_siswaSDMaster->totalSiswaSD=$request->totalSiswaSD;
     $update_siswaSDMaster->totalLaki=$request->totalLaki;
     $update_siswaSDMaster->totalPerempuan=$request->totalPerempuan;
     $update_siswaSDMaster->save();

     $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSiswaSD = 'jmlSiswaSD' . (string)$kodeD;
       $xjmlLaki = 'jmlLaki' . (string)$kodeD;
       $xjmlPerempuan= 'jmlPerempuan' . (string)$kodeD;
       $xjmlGuruSMPHonor = 'jmlGuruSMPHonor' . (string)$kodeD;
       $update_siswaSDDetail = siswaSDDetail::where([
                                                  ['siswaSDMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_siswaSDDetail->jmlSiswaSD=$request->$xjmlSiswaSD;
       $update_siswaSDDetail->jmlLaki=$request->$xjmlLaki;
       $update_siswaSDDetail->jmlPerempuan=$request->$xjmlPerempuan;
       $update_siswaSDDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/siswaSD');
   }
   public function destroy($xdj)
    {
      $cMaster = siswaSDMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = siswaSDDetail::where('siswaSDMaster_id', $xdj)->delete();
      return redirect('/pendidikan/siswaSD');
    }

    public function detail($id){
      $model = siswaSDMaster::where('ta', $id)->first();
      echo view('pendidikan.siswaSD.detail',['ta' => $id, 'data' => $model, 'no' => 1]);
    }

}




