<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\kondisiTKMaster;
use App\Models\pendidikan\kondisiTKDetail;
use View;
use App\Models\kecamatan;

class kondisiTKController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kondisiTKMaster::orderBy('ta','desc')->get();
    $dataChart = kondisiTKMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/kondisiTK/view',['dataA'=> $dataMaster,
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
     $dataMaster = kondisiTKMaster::orderBy('ta','desc')->get();
     $dataChart = kondisiTKMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiTK/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kondisiTKMaster::create([
        // 'ta' => $request->session()->get('tahun_anggaran'),
        'ta' =>session()->get('thn_anggaran'),
        'totalTK' => $request->totalTK,
        'totalKondisiBaik' => $request->totalKondisiBaik,
        'totalRusakRingan' => $request->totalRusakRingan,
        'totalRusakBerat' => $request->totalRusakBerat,
      ]);

      $lastkdeKSD= DB::table('kondisiTKMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlTK = 'jmlTK' . (string)$nomer;
        $xkondisiBaik = 'jmlKondisiBaik' . (string)$nomer;
        $xrusakRingan= 'jmlRusakRingan' . (string)$nomer;
        $xrusakBerat = 'jmlRusakBerat' . (string)$nomer;
        $kodel= kondisiTKDetail::create([
          'kondisiTKMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlTK' => $request->$xjmlTK,
          'jmlKondisiBaik' => $request->$xkondisiBaik,
          'jmlRusakRingan' => $request->$xrusakRingan,
          'jmlRusakBerat' => $request->$xrusakBerat,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/kondisiTK');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kondisiTKMaster::orderBy('ta','desc')->get();
     $dataDetail = kondisiTKDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kondisiTKMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kondisiTKMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiTK/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kondisiTKMaster = kondisiTKMaster::find($id);
     $update_kondisiTKMaster->totalTK=$request->totalTK;
     $update_kondisiTKMaster->totalKondisiBaik=$request->totalKondisiBaik;
     $update_kondisiTKMaster->totalRusakRingan=$request->totalRusakRingan;
     $update_kondisiTKMaster->totalRusakBerat=$request->totalRusakBerat;
     $update_kondisiTKMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlTK = 'jmlTK' . (string)$kodeD;
       $xkondisiBaik = 'jmlKondisiBaik' . (string)$kodeD;
       $xrusakRingan= 'jmlRusakRingan' . (string)$kodeD;
       $xrusakBerat = 'jmlRusakBerat' . (string)$kodeD;
       $update_kondisiTKDetail = kondisiTKDetail::where([
                                                  ['kondisiTKMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kondisiTKDetail->jmlTK=$request->$xjmlTK;
       $update_kondisiTKDetail->jmlKondisiBaik=$request->$xkondisiBaik;
       $update_kondisiTKDetail->jmlRusakRingan=$request->$xrusakRingan;
       $update_kondisiTKDetail->jmlRusakBerat=$request->$xrusakBerat;
       $update_kondisiTKDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/kondisiTK');
   }
   public function destroy($xdj)
    {
      $cMaster = kondisiTKMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kondisiTKDetail::where('kondisiTKMaster_id', $xdj)->delete();
      return redirect('/pendidikan/kondisiTK');
    }

    public function detail($id)
    {
      $model = kondisiTKMaster::where('ta',$id)->first();
      echo view('pendidikan.kondisiTK.detail',['ta'=>$id,'data'=>$model,'no'=>1]);
    }
}
