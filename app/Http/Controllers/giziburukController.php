<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kesehatan\giziburukMaster;
use App\Models\kesehatan\giziburukDetail;
use View;
use App\Models\kesehatan\puskesmas;

class giziburukController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = giziburukMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
    $dataChart = giziburukMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
    $keca = puskesmas::all();
    return view('/kesehatan/giziburuk/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataPuskesmas'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = giziburukMaster::orderBy('ta','desc')->get();
     $dataChart = giziburukMaster::orderBy('ta','asc')->get();
     $keca = puskesmas::all();
     return view('/kesehatan/giziburuk/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataPuskesmas'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = puskesmas::all();
     $kondi = giziburukMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalKasus' => $request->totalKasus,
        'totalPerawatan' => $request->totalPerawatan,
      ]);

      $lastid= DB::table('giziburukMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlKasus = 'jmlKasus' . (string)$nomer;
        $xjmlPerawatan = 'jmlPerawatan' . (string)$nomer;
        $kodel= giziburukDetail::create([
          'giziburukMaster_id' => $lastid->id,
          'puskesmas_id' => $kec->id,
          'jmlKasus' => $request->$xjmlKasus,
          'jmlPerawatan' => $request->$xjmlPerawatan,
        ]);
        $nomer ++;
      }
      return redirect('/kesehatan/giziburuk');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = giziburukMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = giziburukMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = giziburukDetail::join('puskesmas','puskesmas.id','=','puskesmas_id')
                                  ->where('giziburukMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = giziburukMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = puskesmas::all();
     return view('/kesehatan/giziburuk/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataPuskesmas'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = puskesmas::all();
     $update_giziburukMaster = giziburukMaster::find($id);
     $update_giziburukMaster->bln=$request->bln;
     $update_giziburukMaster->totalKasus=$request->totalKasus;
     $update_giziburukMaster->totalPerawatan=$request->totalPerawatan;
     $update_giziburukMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlKasus = 'jmlKasus' . (string)$kodeD;
       $xjmlPerawatan = 'jmlPerawatan' . (string)$kodeD;
       $update_giziburukDetail = giziburukDetail::where([
                                                  ['giziburukMaster_id','=',$id],
                                                  ['puskesmas_id','=',$dataK->id],
                                                ])->first();
       $update_giziburukDetail->jmlKasus=$request->$xjmlKasus;
       $update_giziburukDetail->jmlPerawatan=$request->$xjmlPerawatan;
       $update_giziburukDetail->save();
       $kodeD ++;
     }
     return redirect('/kesehatan/giziburuk');
   }
   public function destroy($xdj)
    {
      $cMaster = giziburukMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = giziburukDetail::where('giziburukMaster_id', $xdj)->delete();
      return redirect('/kesehatan/giziburuk');
    }

    public function detail($id){
      $model = giziburukMaster::where('bln',$id)->first();
      echo view('kesehatan.giziburuk.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
