<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perikanan\armadaMaster;
use App\Models\perikanan\armadaDetail;
use View;
use App\Models\kecamatan;

class armadaController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = armadaMaster::orderBy('ta','desc')->get();
    $dataChart = armadaMaster::orderBy('ta','asc')->get();
    $dataKecamatan = kecamatan::all();
    return view('/perikanan/armada/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = armadaMaster::orderBy('ta','desc')->get();
     $dataChart = armadaMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/armada/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$dataKecamatan]);
   }
   public function store(Request $request)
   {
     $dataKecamatan = kecamatan::all();
     $kondi = armadaMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalArmada' => $request->totalArmada,
        'totalKapalmotor' => $request->totalKapalmotor,
        'totalPerahumotor' => $request->totalPerahumotor,
        'totalPerahutanpamotor' => $request->totalPerahutanpamotor,
      ]);

      $lastkdeKSD= DB::table('armadaMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataKecamatan as $kec) {
        $xjmlArmada = 'jmlArmada' . (string)$nomer;
        $xjmlKapalmotor = 'jmlKapalmotor' . (string)$nomer;
        $xjmlPerahumotor= 'jmlPerahumotor' . (string)$nomer;
        $xjmlPerahutanpamotor = 'jmlPerahutanpamotor' . (string)$nomer;
        $kodel= armadaDetail::create([
          'armadaMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlArmada' => $request->$xjmlArmada,
          'jmlKapalmotor' => $request->$xjmlKapalmotor,
          'jmlPerahumotor' => $request->$xjmlPerahumotor,
          'jmlPerahutanpamotor' => $request->$xjmlPerahutanpamotor,
        ]);
        $nomer ++;
      }
      return redirect('/perikanan/armada');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = armadaMaster::orderBy('ta','desc')->get();
     $dataDetail = armadaDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('armadaMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = armadaMaster::where('id','=',$kodeEdit)->get();
     $dataChart = armadaMaster::orderBy('ta','asc')->get();
     $dataKecamatan = kecamatan::all();
     return view('/perikanan/armada/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataKecamatan'=>$dataKecamatan]);
   }

   public function update(Request $request, $id)
   {
     $dataKecamatan = kecamatan::all();
     $update_armadaMaster = armadaMaster::find($id);
     $update_armadaMaster->totalArmada=$request->totalArmada;
     $update_armadaMaster->totalKapalmotor=$request->totalKapalmotor;
     $update_armadaMaster->totalPerahumotor=$request->totalPerahumotor;
     $update_armadaMaster->totalPerahutanpamotor=$request->totalPerahutanpamotor;
     $update_armadaMaster->save();

     $kodeD = 1;
     foreach ($dataKecamatan as $dataK) {
       $xjmlArmada = 'jmlArmada' . (string)$kodeD;
       $xjmlKapalmotor = 'jmlKapalmotor' . (string)$kodeD;
       $xjmlPerahumotor= 'jmlPerahumotor' . (string)$kodeD;
       $xjmlPerahutanpamotor = 'jmlPerahutanpamotor' . (string)$kodeD;
       $update_armadaDetail = armadaDetail::where([
                                                  ['armadaMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                  ])->first();
       $update_armadaDetail->jmlArmada=$request->$xjmlArmada;
       $update_armadaDetail->jmlKapalmotor=$request->$xjmlKapalmotor;
       $update_armadaDetail->jmlPerahumotor=$request->$xjmlPerahumotor;
       $update_armadaDetail->jmlPerahutanpamotor=$request->$xjmlPerahutanpamotor;
       $update_armadaDetail->save();
       $kodeD ++;
     }
     return redirect('/perikanan/armada');
   }
   public function destroy($xdj)
    {
      $cMaster = armadaMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = armadaDetail::where('armadaMaster_id', $xdj)->delete();
      return redirect('/perikanan/armada');
    }

    public function detail($id){
      $model = armadaMaster::where('ta', $id)->first();
      echo view('perikanan.armada.detail',['ta'=>$id ,'data'=>$model, 'no'=>1]);
    }
}
