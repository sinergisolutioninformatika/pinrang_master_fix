<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\sosial\masalahsosialMaster;
use App\Models\sosial\masalahsosialDetail;
use View;
use App\Models\Sosial\masalahsosial;

class masalahsosialController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = masalahsosialMaster::orderBy('ta','desc')->get();
    $dataChart = masalahsosialMaster::orderBy('ta','asc')->get();
    $datamasalahsosial = masalahsosial::all();
    return view('/sosial/masalahsosial/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'datamasalahsosial'=>$datamasalahsosial]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = masalahsosialMaster::orderBy('ta','desc')->get();
     $dataChart = masalahsosialMaster::orderBy('ta','asc')->get();
     $datamasalahsosial = masalahsosial::all();
     return view('/sosial/masalahsosial/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'datamasalahsosial'=>$datamasalahsosial]);
   }
   public function store(Request $request)
   {
     $datamasalahsosial = masalahsosial::all();
     $kondi = masalahsosialMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalMasalah' => $request->totalMasalah,
      ]);

      $lastkdeKSD= DB::table('masalahsosialMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($datamasalahsosial as $masalahsosial) {
        $xjmlMasalah = 'jmlMasalah' . (string)$nomer;
        $kodel= masalahsosialDetail::create([
          'masalahsosialMaster_id' => $lastkdeKSD->id,
          'masalahsosial_id' => $masalahsosial->id,
          'jmlMasalah' => $request->$xjmlMasalah,
        ]);
        $nomer ++;
      }
      return redirect('/sosial/masalahsosial');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = masalahsosialMaster::orderBy('ta','desc')->get();
     $dataDetail = masalahsosialDetail::join('masalahsosials','masalahsosials.id','=','masalahsosial_id')
                                  ->where('masalahsosialMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = masalahsosialMaster::where('id','=',$kodeEdit)->get();
     $dataChart = masalahsosialMaster::orderBy('ta','asc')->get();
     $datamasalahsosial = masalahsosial::all();
     return view('/sosial/masalahsosial/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'datamasalahsosial'=>$datamasalahsosial]);
   }

   public function update(Request $request, $id)
   {
     $datamasalahsosial = masalahsosial::all();
     $update_masalahsosialMaster = masalahsosialMaster::find($id);
     $update_masalahsosialMaster->totalMasalah=$request->totalMasalah;
     $update_masalahsosialMaster->save();

     $kodeD = 1;
     foreach ($datamasalahsosial as $dataK) {
       $xjmlMasalah = 'jmlMasalah' . (string)$kodeD;
       $update_masalahsosialDetail = masalahsosialDetail::where([
                                                  ['masalahsosialMaster_id','=',$id],
                                                  ['masalahsosial_id','=',$dataK->id],
                                                  ])->first();
       $update_masalahsosialDetail->jmlMasalah=$request->$xjmlMasalah;
       $update_masalahsosialDetail->save();
       $kodeD ++;
     }
     return redirect('/sosial/masalahsosial');
   }
   public function destroy($xdj)
    {
      $cMaster = masalahsosialMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = masalahsosialDetail::where('masalahsosialMaster_id', $xdj)->delete();
      return redirect('/sosial/masalahsosial');
    }

    public function detail($id){
        $model = masalahsosialMaster::where('ta', $id)->first();
        echo view('sosial.masalahsosial.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
