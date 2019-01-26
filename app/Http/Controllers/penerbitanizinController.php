<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pemodal\penerbitanizinMaster;
use App\Models\pemodal\penerbitanizinDetail;
use View;
use App\Models\bidang_izin;

class penerbitanizinController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = penerbitanizinMaster::orderBy('ta','desc')->get();
    $dataChart = penerbitanizinMaster::orderBy('ta','asc')->get();
    $bidang = bidang_izin::all();
    return view('/pemodal/penerbitanizin/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'databidang_izin'=>$bidang]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = penerbitanizinMaster::orderBy('ta','desc')->get();
     $dataChart = penerbitanizinMaster::orderBy('ta','asc')->get();
     $bidang = bidang_izin::all();
     return view('/pemodal/penerbitanizin/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'databidang_izin'=>$bidang]);
   }
   public function store(Request $request)
   {
     $bidang = bidang_izin::all();
     $kondi = penerbitanizinMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalPenerbitan' => $request->totalPenerbitan,
        'totalRetribusi' => $request->totalRetribusi,
      ]);

      $lastid= DB::table('penerbitanizinMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($bidang as $kec) {
        $xjmlPenerbitan = 'jmlPenerbitan' . (string)$nomer;
        $xjmlRetribusi = 'jmlRetribusi' . (string)$nomer;
        $kodel= penerbitanizinDetail::create([
          'penerbitanizinMaster_id' => $lastid->id,
          'bidang_izin_id' => $kec->id,
          'jmlPenerbitan' => $request->$xjmlPenerbitan,
          'jmlRetribusi' => $request->$xjmlRetribusi,
        ]);
        $nomer ++;
      }
      return redirect('/pemodal/penerbitanizin');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = penerbitanizinMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = penerbitanizinMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = penerbitanizinDetail::join('bidang_izins','bidang_izins.id','=','bidang_izin_id')
                                  ->where('penerbitanizinMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = penerbitanizinMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $bidang = bidang_izin::all();
     return view('/pemodal/penerbitanizin/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'databidang_izin'=>$bidang]);
   }

   public function update(Request $request, $id)
   {
     $bidang = bidang_izin::all();
     $update_penerbitanizinMaster = penerbitanizinMaster::find($id);
     $update_penerbitanizinMaster->bln=$request->bln;
     $update_penerbitanizinMaster->totalPenerbitan=$request->totalPenerbitan;
     $update_penerbitanizinMaster->totalRetribusi=$request->totalRetribusi;
     $update_penerbitanizinMaster->save();

    $kodeD = 1;
     foreach ($bidang as $dataK) {
       $xjmlPenerbitan = 'jmlPenerbitan' . (string)$kodeD;
       $xjmlRetribusi = 'jmlRetribusi' . (string)$kodeD;
       $update_penerbitanizinDetail = penerbitanizinDetail::where([
                                                  ['penerbitanizinMaster_id','=',$id],
                                                  ['bidang_izin_id','=',$dataK->id],
                                                ])->first();
       $update_penerbitanizinDetail->jmlPenerbitan=$request->$xjmlPenerbitan;
       $update_penerbitanizinDetail->jmlRetribusi=$request->$xjmlRetribusi;
       $update_penerbitanizinDetail->save();
       $kodeD ++;
     }
     return redirect('/pemodal/penerbitanizin');
   }
   public function destroy($xdj)
    {
      $cMaster = penerbitanizinMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = penerbitanizinDetail::where('penerbitanizinMaster_id', $xdj)->delete();
      return redirect('/pemodal/penerbitanizin');
    }

    public function detail($id)
    {
      $model  = penerbitanizinMaster::where('bln',$id)->first();
      echo view('pemodal/penerbitanizin/detail',['ta'=>$id,'data'=>$model,'no'=>1]);
    }
}
