<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perhubungan\lakalantas;
use View;

class lakalantasController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = lakalantas::orderBy('ta','desc')->get();
    $dataChart = lakalantas::orderBy('ta','asc')->get();
    return view('/perhubungan/lakalantas/view',['dataMaster'=> $dataMaster,
                                              'dataChart'=> $dataChart]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = lakalantas::orderBy('ta','desc')->get();
     $dataChart = lakalantas::orderBy('ta','asc')->get();
     return view('/perhubungan/lakalantas/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = lakalantas::create([
        'ta' => session()->get('thn_anggaran'),
        'jmlKejadian' => $request->jmlKejadian,
        'Meninggal' => $request->Meninggal,
        'Lukaberat' => $request->Lukaberat,
        'Lukaringan' => $request->Lukaringan,
      ]);
      return redirect('/perhubungan/lakalantas');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = lakalantas::orderBy('ta','desc')->get();
     $dataEdit = lakalantas::where('id','=',$kodeEdit)->get();
     $dataChart = lakalantas::orderBy('ta','asc')->get();
     return view('/perhubungan/lakalantas/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_lakalantasMaster = lakalantas::find($id);
     $update_lakalantasMaster->jmlKejadian=$request->jmlKejadian;
     $update_lakalantasMaster->Meninggal=$request->Meninggal;
     $update_lakalantasMaster->Lukaberat=$request->Lukaberat;
     $update_lakalantasMaster->Lukaringan=$request->Lukaringan;
     $update_lakalantasMaster->save();

     return redirect('/perhubungan/lakalantas');
   }
   public function destroy($xdj)
    {
      $cMaster = lakalantas::find($xdj);
      $cMaster->delete();
      return redirect('/perhubungan/lakalantas');
    }
}
