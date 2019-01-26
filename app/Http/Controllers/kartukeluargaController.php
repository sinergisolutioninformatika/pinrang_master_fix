<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kependudukan\kartukeluargaMaster;
use App\Models\kependudukan\kartukeluargaDetail;
use View;
use App\Models\kecamatan;

class kartukeluargaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kartukeluargaMaster::orderBy('ta','desc')->get();
    $dataChart = kartukeluargaMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/kependudukan/kartukeluarga/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataKecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kartukeluargaMaster::orderBy('ta','desc')->get();
     $dataChart = kartukeluargaMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kartukeluarga/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kartukeluargaMaster::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'bln' => $request->bln,
        'totalKK' => $request->totalKK,
        'totalMilikiKK' => $request->totalMilikiKK,
      ]);

      $lastid= DB::table('kartukeluargaMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlKK = 'jmlKK' . (string)$nomer;
        $xjmlMilikiKK = 'jmlMilikiKK' . (string)$nomer;
        $kodel= kartukeluargaDetail::create([
          'kartukeluargaMaster_id' => $lastid->id,
          'kecamatan_id' => $kec->id,
          'jmlKK' => $request->$xjmlKK,
          'jmlMilikiKK' => $request->$xjmlMilikiKK,
        ]);
        $nomer ++;
      }
      return redirect('/kependudukan/kartukeluarga');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kartukeluargaMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = kartukeluargaMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = kartukeluargaDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kartukeluargaMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kartukeluargaMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kartukeluarga/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kartukeluargaMaster = kartukeluargaMaster::find($id);
     $update_kartukeluargaMaster->bln=$request->bln;
     $update_kartukeluargaMaster->totalKK=$request->totalKK;
     $update_kartukeluargaMaster->totalMilikiKK=$request->totalMilikiKK;
     $update_kartukeluargaMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlKK = 'jmlKK' . (string)$kodeD;
       $xjmlMilikiKK = 'jmlMilikiKK' . (string)$kodeD;
       $update_kartukeluargaDetail = kartukeluargaDetail::where([
                                                  ['kartukeluargaMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kartukeluargaDetail->jmlKK=$request->$xjmlKK;
       $update_kartukeluargaDetail->jmlMilikiKK=$request->$xjmlMilikiKK;
       $update_kartukeluargaDetail->save();
       $kodeD ++;
     }
     return redirect('/kependudukan/kartukeluarga');
   }
   public function destroy($xdj)
    {
      $cMaster = kartukeluargaMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kartukeluargaDetail::where('kartukeluargaMaster_id', $xdj)->delete();
      return redirect('/kependudukan/kartukeluarga');
    }

    public function detail($id){
      $model = kartukeluargaMaster::where('bln', $id)->first();

      echo view('kependudukan.kartukeluarga.detail',['ta'=>$id,'data'=>$model, 'no'=>1]);
    }
}
