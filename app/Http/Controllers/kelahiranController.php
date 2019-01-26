<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kependudukan\kelahiranMaster;
use App\Models\kependudukan\kelahiranDetail;
use View;
use App\Models\kecamatan;

class kelahiranController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = kelahiranMaster::orderBy('ta','desc')->get();
    $dataChart = kelahiranMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/kependudukan/kelahiran/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = kelahiranMaster::orderBy('ta','desc')->get();
     $dataChart = kelahiranMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kelahiran/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                           'dataKecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kelahiranMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'bln' => $request->bln,
        'totalKelahiran' => $request->totalKelahiran,
        'totalKematian' => $request->totalKematian,
      ]);

      $lastid= DB::table('kelahiranMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlKelahiran = 'jmlKelahiran' . (string)$nomer;
        $xjmlKematian = 'jmlKematian' . (string)$nomer;
        $kodel= kelahiranDetail::create([
          'kelahiranMaster_id' => $lastid->id,
          'kecamatan_id' => $kec->id,
          'jmlKelahiran' => $request->$xjmlKelahiran,
          'jmlKematian' => $request->$xjmlKematian,
        ]);
        $nomer ++;
      }
      return redirect('/kependudukan/kelahiran');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kelahiranMaster::orderBy('ta','desc')->where('ta','=',$ta)->get();
     $dataEdit = kelahiranMaster::where('id','=',$kodeEdit)->get();
     $dataDetail = kelahiranDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kelahiranMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kelahiranMaster::orderBy('ta','asc')->where('ta','=',$ta)->get();
     $keca = kecamatan::all();
     return view('/kependudukan/kelahiran/edit',['dataMaster'=> $dataMaster,
                                                'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                                'kodeEdit'=>$kodeEdit,
                                           'dataKecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kelahiranMaster = kelahiranMaster::find($id);
     $update_kelahiranMaster->bln=$request->bln;
     $update_kelahiranMaster->totalKelahiran=$request->totalKelahiran;
     $update_kelahiranMaster->totalKematian=$request->totalKematian;
     $update_kelahiranMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlKelahiran = 'jmlKelahiran' . (string)$kodeD;
       $xjmlKematian = 'jmlKematian' . (string)$kodeD;
       $update_kelahiranDetail = kelahiranDetail::where([
                                                  ['kelahiranMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kelahiranDetail->jmlKelahiran=$request->$xjmlKelahiran;
       $update_kelahiranDetail->jmlKematian=$request->$xjmlKematian;
       $update_kelahiranDetail->save();
       $kodeD ++;
     }
     return redirect('/kependudukan/kelahiran');
   }
   public function destroy($xdj)
    {
      $cMaster = kelahiranMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kelahiranDetail::where('kelahiranMaster_id', $xdj)->delete();
      return redirect('/kependudukan/kelahiran');
    }

    public function detail($id){
      $model = kelahiranMaster::where('ta',$id)->first();
      echo view('kependudukan.kelahiran.detail', ['ta'=>$id, 'data'=>$model, 'no'=>1]);
    }
}
