<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\psda\luassawahMaster;
use App\Models\psda\luassawahDetail;
use App\Models\psda\uptd_psda;
use View;


class luassawahController extends Controller
{
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = luassawahMaster::orderBy('ta','desc')->get();
     $dataChart = luassawahMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/luassawah/view',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'uptd'=>$uptd]);
   }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = luassawahMaster::orderBy('ta','desc')->get();
     $dataChart = luassawahMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/luassawah/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'uptd'=>$uptd]);
   }
   public function store(Request $request)
   {
     $uptd = uptd_psda::all();
     $kondi = luassawahMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalPetak' => $request->totalPetak,
        'totalLuas' => $request->totalLuas,
      ]);

      $lastid= DB::table('luassawahMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($uptd as $kec) {
        $xjmlPetak = 'jmlPetak' . (string)$nomer;
        $xjmlLuas = 'jmlLuas' . (string)$nomer;
        $kodel= luassawahDetail::create([
          'luassawahMaster_id' => $lastid->id,
          'uptd_psda_id' => $kec->id,
          'jmlPetak' => $request->$xjmlPetak,
          'jmlLuas' => $request->$xjmlLuas,
        ]);
        $nomer ++;
      }
      return redirect('/psda/luassawah');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = luassawahMaster::orderBy('ta','desc')->get();
     $dataEdit = luassawahMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = luassawahDetail::join('uptd_psdas','uptd_psdas.id','=','uptd_psda_id')
                                  ->where('luassawahMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = luassawahMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/luassawah/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                                    'uptd'=>$uptd]);
   }

   public function update(Request $request, $id)
   {
     $uptd = uptd_psda::all();
     $update_luassawahMaster = luassawahMaster::find($id);
     $update_luassawahMaster->totalPetak=$request->totalPetak;
     $update_luassawahMaster->totalLuas=$request->totalLuas;
     $update_luassawahMaster->save();

    $kodeD = 1;
     foreach ($uptd as $dataK) {
       $xjmlPetak = 'jmlPetak' . (string)$kodeD;
       $xjmlLuas = 'jmlLuas' . (string)$kodeD;
       $update_luassawahDetail = luassawahDetail::where([
                                                  ['luassawahMaster_id','=',$id],
                                                  ['uptd_psda_id','=',$dataK->id],
                                                ])->first();
       $update_luassawahDetail->jmlPetak=$request->$xjmlPetak;
       $update_luassawahDetail->jmlLuas=$request->$xjmlLuas;
       $update_luassawahDetail->save();
       $kodeD ++;
     }
     return redirect('/psda/luassawah');
   }
   public function destroy($xdj)
    {
      $cMaster = luassawahMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = luassawahDetail::where('luassawahMaster_id', $xdj)->delete();
      return redirect('/psda/luassawah');
    }
   public function show()
   {
     $dataMaster = luassawahMaster::orderBy('ta','desc')->get();
     $dataChart = luassawahMaster::orderBy('ta','asc')->get();
     $uptd = uptd_psda::all();
     return view('/psda/luassawah/show',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'uptd'=>$uptd]);
   }

   public function detail($id)
   {
    $model = luassawahMaster::where('ta',$id)->first();
    echo view('psda.luassawah.detail',['ta'=>$id,'data'=>$model,'no'=>1]);
   }
}
