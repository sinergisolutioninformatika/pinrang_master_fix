<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\perpusarsip\kunjunganMaster;
use App\Models\perpusarsip\kunjunganDetail;
use View;
use App\Models\perpusarsip\lokasiperpustakaan;

class kunjunganController extends Controller
{
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kunjunganMaster::orderBy('ta','desc')->get();
     $dataChart = kunjunganMaster::orderBy('ta','asc')->get();
     $dataLokasi = lokasiperpustakaan::all();
     return view('/perpusarsip/kunjungan/home',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                              'dataLokasi'=>$dataLokasi]);
   }
   public function view(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kunjunganMaster::orderBy('ta','desc')->get();
     $dataChart = kunjunganMaster::orderBy('ta','asc')->get();
     $dataLokasi = lokasiperpustakaan::all();
     return view('/perpusarsip/kunjungan/view',['dataMaster'=> $dataMaster,
                                               'dataChart'=> $dataChart,
                                              'dataLokasi'=>$dataLokasi]);
   }
   
  //  public function detailKunjungan($id){
  //    echo "id";
  //  }

   public function store(Request $request)
   {
     $dataLokasi = lokasiperpustakaan::all();
     $kondi = kunjunganMaster::create([
        'ta' => session()->get('thn_anggaran'),
        'totalKunjungan' => $request->totalKunjungan,
        'totalLaki' => $request->totalLaki,
        'totalPerempuan' => $request->totalPerempuan,
      ]);

      $lastkdeKSD= DB::table('kunjunganMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($dataLokasi as $lokasi) {
        $xjmlKunjungan = 'jmlKunjungan' . (string)$nomer;
        $xjmlLaki = 'jmlLaki' . (string)$nomer;
        $xjmlPerempuan= 'jmlPerempuan' . (string)$nomer;
        $kodel= kunjunganDetail::create([
          'kunjunganMaster_id' => $lastkdeKSD->id,
          'lokasiperpustakaan_id' => $lokasi->id,
          'jmlKunjungan' => $request->$xjmlKunjungan,
          'jmlLaki' => $request->$xjmlLaki,
          'jmlPerempuan' => $request->$xjmlPerempuan,
        ]);
        $nomer ++;
      }
      return redirect('/perpusarsip/kunjungan');
   }

   public function edit(Request $request, $kodeEdit) 
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kunjunganMaster::orderBy('ta','desc')->get();
     $dataDetail = kunjunganDetail::join('lokasiperpustakaans','lokasiperpustakaans.id','=','lokasiperpustakaan_id')
                                  ->where('kunjunganMaster_id','=', $kodeEdit)
                                  ->get();
    $dataEdit = kunjunganMaster::where('ta','=',$kodeEdit)->first();
     $dataChart = kunjunganMaster::orderBy('ta','asc')->get();
     $dataLokasi = lokasiperpustakaan::all();
     return view('/perpusarsip/kunjungan/edit',['dataMaster'=> $dataMaster,
                                              'dataEdit'=> $dataEdit,
                                               'dataDetail'=> $dataDetail,
                                               'dataChart'=> $dataChart,
                                               'kodeEdit'=>$kodeEdit,
                                              'dataLokasi'=>$dataLokasi]);
   }

   public function update(Request $request, $id)
   {
     $dataLokasi = lokasiperpustakaan::all();
     $update_kunjunganMaster = kunjunganMaster::find($id);
     $update_kunjunganMaster->totalKunjungan=$request->totalKunjungan;
     $update_kunjunganMaster->totalLaki=$request->totalLaki;
     $update_kunjunganMaster->totalPerempuan=$request->totalPerempuan;
     $update_kunjunganMaster->save();

     $kodeD = 1;
     foreach ($dataLokasi as $dataK) {
       $xjmlKunjungan = 'jmlKunjungan' . (string)$kodeD;
       $xjmlLaki = 'jmlLaki' . (string)$kodeD;
       $xjmlPerempuan= 'jmlPerempuan' . (string)$kodeD;
       $update_kunjunganDetail = kunjunganDetail::where([
                                                  ['kunjunganMaster_id','=',$id],
                                                  ['lokasiperpustakaan_id','=',$dataK->id],
                                                  ])->first();
       $update_kunjunganDetail->jmlKunjungan=$request->$xjmlKunjungan;
       $update_kunjunganDetail->jmlLaki=$request->$xjmlLaki;
       $update_kunjunganDetail->jmlPerempuan=$request->$xjmlPerempuan;
       $update_kunjunganDetail->save();
       $kodeD ++;
     }
     return redirect('/perpusarsip/kunjungan');
   }
   public function destroy($xdj)
    {
      $cMaster = kunjunganMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kunjunganDetail::where('kunjunganMaster_id', $xdj)->delete();
      return redirect('/perpusarsip/kunjungan');
    }

    public function detail($id){
        $model = kunjunganMaster::where('ta', $id)->first();
        echo view('perpusarsip.kunjungan.detail',['ta' =>$id, 'data'=>$model, 'no'=>1]);
    }
}
