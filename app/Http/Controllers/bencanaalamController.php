<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bpbd\bencanaalamMaster;
use App\Models\bpbd\bencanaalamDetail;
use View;
use App\Models\kecamatan;

class bencanaalamController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = bencanaalamMaster::orderBy('ta','desc')->get();
    $dataChart = bencanaalamMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/bpbd/bencanaalam/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart,
                                          'dataKecamatan'=>$dataKecamatan]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = bencanaalamMaster::orderBy('ta','desc')->get();
     $dataChart = bencanaalamMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/bpbd/bencanaalam/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = bencanaalamMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalKejadian' => $request->totalKejadian,
        'totalBanjir' => $request->totalBanjir,
        'totalKebakaran' => $request->totalKebakaran,
        'totalKekeringan' => $request->totalKekeringan,
        'totalAnginkencang' => $request->totalAnginkencang,
        'totalTanahlongsor' => $request->totalTanahlongsor,
      ]);

      $lastkdeKSD= DB::table('bencanaalamMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlKejadian = 'jmlKejadian' . (string)$nomer;
        $xjmlBanjir = 'jmlBanjir' . (string)$nomer;
        $xjmlKebakaran = 'jmlKebakaran' . (string)$nomer;
        $xjmlKekeringan = 'jmlKekeringan' . (string)$nomer;
        $xjmlAnginkencang = 'jmlAnginkencang' . (string)$nomer;
        $xjmlTanahlongsor = 'jmlTanahlongsor' . (string)$nomer;
        $kodel= bencanaalamDetail::create([
          'bencanaalamMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlKejadian' => $request->$xjmlKejadian,
          'jmlBanjir' => $request->$xjmlBanjir,
          'jmlKebakaran' => $request->$xjmlKebakaran,
          'jmlKekeringan' => $request->$xjmlKekeringan,
          'jmlAnginkencang' => $request->$xjmlAnginkencang,
          'jmlTanahlongsor' => $request->$xjmlTanahlongsor,
        ]);
        $nomer ++;
      }
      return redirect('/bpbd/bencanaalam');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = bencanaalamMaster::orderBy('ta','desc')->get();
     $dataDetail = bencanaalamDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('bencanaalamMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = bencanaalamMaster::where('id','=',$kodeEdit)->get();
     $dataChart = bencanaalamMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/bpbd/bencanaalam/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_bencanaalamMaster = bencanaalamMaster::find($id);
     $update_bencanaalamMaster->totalKejadian=$request->totalKejadian;
     $update_bencanaalamMaster->totalBanjir=$request->totalBanjir;
     $update_bencanaalamMaster->totalKebakaran=$request->totalKebakaran;
     $update_bencanaalamMaster->totalKekeringan=$request->totalKekeringan;
     $update_bencanaalamMaster->totalAnginkencang=$request->totalAnginkencang;
     $update_bencanaalamMaster->totalTanahlongsor=$request->totalTanahlongsor;
     $update_bencanaalamMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlKejadian = 'jmlKejadian' . (string)$kodeD;
       $xjmlBanjir = 'jmlBanjir' . (string)$kodeD;
       $xjmlKebakaran = 'jmlKebakaran' . (string)$kodeD;
       $xjmlKekeringan = 'jmlKekeringan' . (string)$kodeD;
       $xjmlAnginkencang = 'jmlAnginkencang' . (string)$kodeD;
       $xjmlTanahlongsor = 'jmlTanahlongsor' . (string)$kodeD;
       $update_bencanaalamDetail = bencanaalamDetail::where([
                                                  ['bencanaalamMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_bencanaalamDetail->jmlKejadian=$request->$xjmlKejadian;
       $update_bencanaalamDetail->jmlBanjir=$request->$xjmlBanjir;
       $update_bencanaalamDetail->jmlKebakaran=$request->$xjmlKebakaran;
       $update_bencanaalamDetail->jmlKekeringan=$request->$xjmlKekeringan;
       $update_bencanaalamDetail->jmlAnginkencang=$request->$xjmlAnginkencang;
       $update_bencanaalamDetail->jmlTanahlongsor=$request->$xjmlTanahlongsor;
       $update_bencanaalamDetail->save();
       $kodeD ++;
     }
     return redirect('/bpbd/bencanaalam');
   }
   public function destroy($xdj)
    {
      $cMaster = bencanaalamMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = bencanaalamDetail::where('bencanaalamMaster_id', $xdj)->delete();
      return redirect('/bpbd/bencanaalam');
    }

    public function detail($id)
    {
      $model = bencanaalamMaster::where('ta',$id)->first();
      echo view('bpbd.bencanaalam.detail',['ta'=>$id,'data'=>$model,'no'=>1]);
    }
}
