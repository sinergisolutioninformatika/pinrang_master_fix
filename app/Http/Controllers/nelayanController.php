<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\nelayanMaster;
use App\Models\perikanan\nelayanDetail;
use View;
use App\Models\kecamatan;

class nelayanController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = nelayanMaster::orderBy('ta','desc')->get();
    $dataChart = nelayanMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/nelayan/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = nelayanMaster::orderBy('ta','desc')->get();
     $dataChart = nelayanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/nelayan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = nelayanMaster::create([
        'ta' =>session()->get('thn_anggaran'),
        'totalNelayan' => $request->totalNelayan,
        'totalNelayanlaut' => $request->totalNelayanlaut,
        'totalNelayandarat' => $request->totalNelayandarat,
        'totalPetanisawah' => $request->totalPetanisawah,
        'totalPetanikolam' => $request->totalPetanikolam,
        'totalPetanitambak' => $request->totalPetanitambak,
      ]);

      $lastkdeKSD= DB::table('nelayanMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlNelayan = 'jmlNelayan' . (string)$nomer;
        $xjmlNelayanlaut = 'jmlNelayanlaut' . (string)$nomer;
        $xjmlNelayandarat= 'jmlNelayandarat' . (string)$nomer;
        $xjmlPetanisawah = 'jmlPetanisawah' . (string)$nomer;
        $xjmlPetanikolam = 'jmlPetanikolam' . (string)$nomer;
        $xjmlPetanitambak = 'jmlPetanitambak' . (string)$nomer;
        $kodel= nelayanDetail::create([
          'nelayanMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlNelayan' => $request->$xjmlNelayan,
          'jmlNelayanlaut' => $request->$xjmlNelayanlaut,
          'jmlNelayandarat' => $request->$xjmlNelayandarat,
          'jmlPetanisawah' => $request->$xjmlPetanisawah,
          'jmlPetanikolam' => $request->$xjmlPetanikolam,
          'jmlPetanitambak' => $request->$xjmlPetanitambak,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/nelayan');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = nelayanMaster::orderBy('ta','desc')->get();
     $dataDetail = nelayanDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('nelayanMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = nelayanMaster::where('id','=',$kodeEdit)->get();
     $dataChart = nelayanMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/nelayan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_nelayanMaster = nelayanMaster::find($id);
     $update_nelayanMaster->totalNelayan=$request->totalNelayan;
     $update_nelayanMaster->totalNelayanlaut=$request->totalNelayanlaut;
     $update_nelayanMaster->totalNelayandarat=$request->totalNelayandarat;
     $update_nelayanMaster->totalPetanisawah=$request->totalPetanisawah;
     $update_nelayanMaster->totalPetanikolam=$request->totalPetanikolam;
     $update_nelayanMaster->totalPetanitambak=$request->totalPetanitambak;
     $update_nelayanMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlNelayan = 'jmlNelayan' . (string)$kodeD;
       $xjmlNelayanlaut = 'jmlNelayanlaut' . (string)$kodeD;
       $xjmlNelayandarat= 'jmlNelayandarat' . (string)$kodeD;
       $xjmlPetanisawah = 'jmlPetanisawah' . (string)$kodeD;
       $xjmlPetanikolam = 'jmlPetanikolam' . (string)$kodeD;
       $xjmlPetanitambak = 'jmlPetanitambak' . (string)$kodeD;
       $update_nelayanDetail = nelayanDetail::where([
                                                  ['nelayanMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_nelayanDetail->jmlNelayan=$request->$xjmlNelayan;
       $update_nelayanDetail->jmlNelayanlaut=$request->$xjmlNelayanlaut;
       $update_nelayanDetail->jmlNelayandarat=$request->$xjmlNelayandarat;
       $update_nelayanDetail->jmlPetanisawah=$request->$xjmlPetanisawah;
       $update_nelayanDetail->jmlPetanikolam=$request->$xjmlPetanikolam;
       $update_nelayanDetail->jmlPetanitambak=$request->$xjmlPetanitambak;
       $update_nelayanDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/nelayan');
   }
   public function destroy($xdj)
    {
      $cMaster = nelayanMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = nelayanDetail::where('nelayanMaster_id', $xdj)->delete();
      return redirect('/perikanan/nelayan');
    }

    public function detail($id){
      $model = nelayanMaster::where('ta', $id)->first();
      echo view('perikanan.nelayan.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
