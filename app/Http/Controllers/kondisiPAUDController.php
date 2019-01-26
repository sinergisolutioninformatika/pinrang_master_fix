<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\kondisiPAUDMaster;
use App\Models\pendidikan\kondisiPAUDDetail;
use View;
use App\Models\kecamatan;

class kondisiPAUDController extends Controller
{
  public function view(Request $request)
  {
    $ta=$request->session()->get('tahun_anggaran');
    View::share('tahun',$ta);
    $dataMaster = kondisiPAUDMaster::orderBy('ta','desc')->get();
    $dataChart = kondisiPAUDMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/kondisiPAUD/view',['dataA'=> $dataMaster,
                                              'dataC'=> $dataChart,
                                          'kecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kondisiPAUDMaster::orderBy('ta','desc')->get();
     $dataChart = kondisiPAUDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiPAUD/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kondisiPAUDMaster::create([
        // 'ta' => $request->session()->get('tahun_anggaran'),
        'ta' => $request->session()->get('tahun_anggaran'),
        'totalPAUD' => $request->totalPAUD,
        'totalKondisiBaik' => $request->totalKondisiBaik,
        'totalRusakRingan' => $request->totalRusakRingan,
        'totalRusakBerat' => $request->totalRusakBerat,
      ]);

      $lastkdeKSD= DB::table('kondisiPAUDMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlPAUD = 'jmlPAUD' . (string)$nomer;
        $xkondisiBaik = 'jmlKondisiBaik' . (string)$nomer;
        $xrusakRingan= 'jmlRusakRingan' . (string)$nomer;
        $xrusakBerat = 'jmlRusakBerat' . (string)$nomer;
        $kodel= kondisiPAUDDetail::create([
          'kondisiPAUDMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlPAUD' => $request->$xjmlPAUD,
          'jmlKondisiBaik' => $request->$xkondisiBaik,
          'jmlRusakRingan' => $request->$xrusakRingan,
          'jmlRusakBerat' => $request->$xrusakBerat,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/kondisiPAUD');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kondisiPAUDMaster::orderBy('ta','desc')->get();
     $dataDetail = kondisiPAUDDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kondisiPAUDMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kondisiPAUDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiPAUD/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kondisiPAUDMaster = kondisiPAUDMaster::find($id);
     $update_kondisiPAUDMaster->totalPAUD=$request->totalPAUD;
     $update_kondisiPAUDMaster->totalKondisiBaik=$request->totalKondisiBaik;
     $update_kondisiPAUDMaster->totalRusakRingan=$request->totalRusakRingan;
     $update_kondisiPAUDMaster->totalRusakBerat=$request->totalRusakBerat;
     $update_kondisiPAUDMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlPAUD = 'jmlPAUD' . (string)$kodeD;
       $xkondisiBaik = 'jmlKondisiBaik' . (string)$kodeD;
       $xrusakRingan= 'jmlRusakRingan' . (string)$kodeD;
       $xrusakBerat = 'jmlRusakBerat' . (string)$kodeD;
       $update_kondisiPAUDDetail = kondisiPAUDDetail::where([
                                                  ['kondisiPAUDMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kondisiPAUDDetail->jmlPAUD=$request->$xjmlPAUD;
       $update_kondisiPAUDDetail->jmlKondisiBaik=$request->$xkondisiBaik;
       $update_kondisiPAUDDetail->jmlRusakRingan=$request->$xrusakRingan;
       $update_kondisiPAUDDetail->jmlRusakBerat=$request->$xrusakBerat;
       $update_kondisiPAUDDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/kondisiPAUD');
   }
   public function destroy($xdj)
    {
      $cMaster = kondisiPAUDMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kondisiPAUDDetail::where('kondisiPAUDMaster_id', $xdj)->delete();
      return redirect('/pendidikan/kondisiPAUD');
    }

    public function detail($id)
    {
      $model = kondisiPAUDMaster::where('ta',$id)->first();
      echo view('pendidikan.kondisiPAUD.detail',['ta'=>$id,'data'=>$model,'no'=>1]);
    }
}
