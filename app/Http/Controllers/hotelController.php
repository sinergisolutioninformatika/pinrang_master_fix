<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\parawisata\hotel;
use View;

class hotelController extends Controller
{
  public function view(Request $request)
  {
    $kodeSKPD=$request->session()->get('kodeSKPD');
    $namaSKPD=$request->session()->get('namaSKPD');
    $ta=$request->session()->get('tahun_anggaran');
    View::share('kodeSKPD',$kodeSKPD);
    View::share('skpd',$namaSKPD);
    View::share('ta',$ta);
    $dataMaster = hotel::orderBy('ta','desc')->get();
    $dataChart = hotel::orderBy('ta','asc')->get();
    return view('/parawisata/hotel/view',['dataMaster'=> $dataMaster,
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
     $dataMaster = hotel::orderBy('ta','desc')->get();
     $dataChart = hotel::orderBy('ta','asc')->get();
     return view('/parawisata/hotel/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart]);
   }
   public function store(Request $request)
   {
     $kondi = hotel::create([
        'ta' => $request->session()->get('tahun_anggaran'),
        'jmlWisma' => $request->jmlWisma,
        'jmlMelati1' => $request->jmlMelati1,
        'jmlMelati2' => $request->jmlMelati2,
        'jmlMelati3' => $request->jmlMelati3,
        'jmlHotel' => $request->jmlHotel,
      ]);
      return redirect('/parawisata/hotel');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = hotel::orderBy('ta','desc')->get();
     $dataEdit = hotel::where('id','=',$kodeEdit)->get();
     $dataChart = hotel::orderBy('ta','asc')->get();
     return view('/parawisata/hotel/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit]);
   }

   public function update(Request $request, $id)
   {
     $update_hotelMaster = hotel::find($id);
     $update_hotelMaster->jmlWisma=$request->jmlWisma;
     $update_hotelMaster->jmlMelati1=$request->jmlMelati1;
     $update_hotelMaster->jmlMelati2=$request->jmlMelati2;
     $update_hotelMaster->jmlMelati3=$request->jmlMelati3;
     $update_hotelMaster->jmlHotel=$request->jmlHotel;
     $update_hotelMaster->save();

     return redirect('/parawisata/hotel');
   }
   public function destroy($xdj)
    {
      $cMaster = hotel::find($xdj);
      $cMaster->delete();
      return redirect('/parawisata/hotel');
    }
}
