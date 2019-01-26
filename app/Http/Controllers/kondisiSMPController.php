<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\kondisiSMPMaster;
use App\Models\pendidikan\kondisiSMPDetail;
use View;
use App\Models\kecamatan;

class kondisiSMPController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kondisiSMPMaster::orderBy('ta','desc')->get();
    $dataChart = kondisiSMPMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/kondisiSMP/view',['dataA'=> $dataMaster,
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
     $dataMaster = kondisiSMPMaster::orderBy('ta','desc')->get();
     $dataChart = kondisiSMPMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiSMP/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kondisiSMPMaster::create([
        // 'ta' => $request->session()->get('tahun_anggaran'),
        'ta' => session()->get('thn_anggaran'),
        'totalSMP' => $request->totalSMP,
        'totalKondisiBaik' => $request->totalKondisiBaik,
        'totalRusakRingan' => $request->totalRusakRingan,
        'totalRusakBerat' => $request->totalRusakBerat,
      ]);

      $lastkdeKSD= DB::table('kondisiSMPMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSMP = 'jmlSMP' . (string)$nomer;
        $xkondisiBaik = 'jmlKondisiBaik' . (string)$nomer;
        $xrusakRingan= 'jmlRusakRingan' . (string)$nomer;
        $xrusakBerat = 'jmlRusakBerat' . (string)$nomer;
        $kodel= kondisiSMPDetail::create([
          'kondisiSMPMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlSMP' => $request->$xjmlSMP,
          'jmlKondisiBaik' => $request->$xkondisiBaik,
          'jmlRusakRingan' => $request->$xrusakRingan,
          'jmlRusakBerat' => $request->$xrusakBerat,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/kondisiSMP');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kondisiSMPMaster::orderBy('ta','desc')->get();
     $dataDetail = kondisiSMPDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kondisiSMPMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kondisiSMPMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiSMP/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kondisiSMPMaster = kondisiSMPMaster::find($id);
     $update_kondisiSMPMaster->totalSMP=$request->totalSMP;
     $update_kondisiSMPMaster->totalKondisiBaik=$request->totalKondisiBaik;
     $update_kondisiSMPMaster->totalRusakRingan=$request->totalRusakRingan;
     $update_kondisiSMPMaster->totalRusakBerat=$request->totalRusakBerat;
     $update_kondisiSMPMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSMP = 'jmlSMP' . (string)$kodeD;
       $xkondisiBaik = 'jmlKondisiBaik' . (string)$kodeD;
       $xrusakRingan= 'jmlRusakRingan' . (string)$kodeD;
       $xrusakBerat = 'jmlRusakBerat' . (string)$kodeD;
       $update_kondisiSMPDetail = kondisiSMPDetail::where([
                                                  ['kondisiSMPMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kondisiSMPDetail->jmlSMP=$request->$xjmlSMP;
       $update_kondisiSMPDetail->jmlKondisiBaik=$request->$xkondisiBaik;
       $update_kondisiSMPDetail->jmlRusakRingan=$request->$xrusakRingan;
       $update_kondisiSMPDetail->jmlRusakBerat=$request->$xrusakBerat;
       $update_kondisiSMPDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/kondisiSMP');
   }
   public function destroy($xdj)
    {
      $cMaster = kondisiSMPMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kondisiSMPDetail::where('kondisiSMPMaster_id', $xdj)->delete();
      return redirect('/pendidikan/kondisiSMP');
    }

    public function detail($id)
    {
      $model = kondisiSMPMaster::where('ta',$id)->first();
      echo view('pendidikan.kondisiSMP.detail',['ta'=>$id,'data'=>$model,'no' => 1]);;
    }
}
