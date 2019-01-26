<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendidikan\kondisiSDMaster;
use App\Models\pendidikan\kondisiSDDetail;
use View;
use App\Models\kecamatan;
use App\Models\pendidikan\detailSDRusak;
use App\fotoKerusakan;

class kondisiSDController extends Controller
{

  

  public function view(Request $request)
  {
    // $kodeSKPD=$request->session()->get('kodeSKPD');
    // $namaSKPD=$request->session()->get('namaSKPD');
    // $ta=$request->session()->get('tahun_anggaran');
    // View::share('kodeSKPD',$kodeSKPD);
    // View::share('skpd',$namaSKPD);
    // View::share('ta',$ta);
    $dataMaster = kondisiSDMaster::orderBy('ta','desc')->get();
    $dataChart = kondisiSDMaster::orderBy('ta','asc')->get();
    $keca = kecamatan::all();
    return view('/pendidikan/kondisiSD/view',['dataA'=> $dataMaster,
                                              'dataC'=> $dataChart,
                                          'kecamatan'=>$keca]);
  }
   public function index(Request $request)
   {
     $kodeSKPD=$request->session()->get('kodeSKPD');
     $namaSKPD=$request->session()->get('namaSKPD');
     $ta=$request->session()->get('tahun_anggaran');
     View::share('kodeSKPD',$kodeSKPD);
     View::share('skpd',$namaSKPD);
     View::share('ta',$ta);
     $dataMaster = kondisiSDMaster::orderBy('ta','desc')->get();
     $dataChart = kondisiSDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiSD/home',['dataA'=> $dataMaster,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }
   public function store(Request $request)
   {
     $keca = kecamatan::all();
     $kondi = kondisiSDMaster::create([
        // 'ta' => $request->session()->get('tahun_anggaran'),
        'ta' => session()->get('thn_anggaran'),
        'totalSD' => $request->totalSD,
        'totalKondisiBaik' => $request->totalKondisiBaik,
        'totalRusakRingan' => $request->totalRusakRingan,
        'totalRusakBerat' => $request->totalRusakBerat,
      ]);

      $lastkdeKSD= DB::table('kondisiSDMasters')->orderBy('id', 'desc')->first();
      $nomer = 1;
      foreach ($keca as $kec) {
        $xjmlSD = 'jmlSD' . (string)$nomer;
        $xkondisiBaik = 'jmlKondisiBaik' . (string)$nomer;
        $xrusakRingan= 'jmlRusakRingan' . (string)$nomer;
        $xrusakBerat = 'jmlRusakBerat' . (string)$nomer;
        $kodel= kondisiSDDetail::create([
          'kondisiSDMaster_id' => $lastkdeKSD->id,
          'kecamatan_id' => $kec->id,
          'jmlSD' => $request->$xjmlSD,
          'jmlKondisiBaik' => $request->$xkondisiBaik,
          'jmlRusakRingan' => $request->$xrusakRingan,
          'jmlRusakBerat' => $request->$xrusakBerat,
        ]);
        $nomer ++;
      }
      return redirect('/pendidikan/kondisiSD');
   }

   public function edit(Request $request, $kodeEdit)
   {
     $ta=$request->session()->get('tahun_anggaran');
     View::share('tahun',$ta);
     $dataMaster = kondisiSDMaster::orderBy('ta','desc')->get();
     $dataDetail = kondisiSDDetail::join('kecamatans','kecamatans.id','=','kecamatan_id')
                                  ->where('kondisiSDMaster_id','=', $kodeEdit)
                                  ->get();
     $dataChart = kondisiSDMaster::orderBy('ta','asc')->get();
     $keca = kecamatan::all();
     return view('/pendidikan/kondisiSD/edit',['dataM'=> $dataMaster,
                                               'dataD'=> $dataDetail,
                                               'dataC'=> $dataChart,
                                           'kecamatan'=>$keca]);
   }

   public function update(Request $request, $id)
   {
     $keca = kecamatan::all();
     $update_kondisiSDMaster = kondisiSDMaster::find($id);
     $update_kondisiSDMaster->totalSD=$request->totalSD;
     $update_kondisiSDMaster->totalKondisiBaik=$request->totalKondisiBaik;
     $update_kondisiSDMaster->totalRusakRingan=$request->totalRusakRingan;
     $update_kondisiSDMaster->totalRusakBerat=$request->totalRusakBerat;
     $update_kondisiSDMaster->save();

    $kodeD = 1;
     foreach ($keca as $dataK) {
       $xjmlSD = 'jmlSD' . (string)$kodeD;
       $xkondisiBaik = 'jmlKondisiBaik' . (string)$kodeD;
       $xrusakRingan= 'jmlRusakRingan' . (string)$kodeD;
       $xrusakBerat = 'jmlRusakBerat' . (string)$kodeD;
       $update_kondisiSDDetail = kondisiSDDetail::where([
                                                  ['kondisiSDMaster_id','=',$id],
                                                  ['kecamatan_id','=',$dataK->id],
                                                ])->first();
       $update_kondisiSDDetail->jmlSD=$request->$xjmlSD;
       $update_kondisiSDDetail->jmlKondisiBaik=$request->$xkondisiBaik;
       $update_kondisiSDDetail->jmlRusakRingan=$request->$xrusakRingan;
       $update_kondisiSDDetail->jmlRusakBerat=$request->$xrusakBerat;
       $update_kondisiSDDetail->save();
       $kodeD ++;
     }
     return redirect('/pendidikan/kondisiSD');
   }
   public function destroy($xdj)
    {
      $cMaster = kondisiSDMaster::find($xdj);
      $cMaster->delete();
      $deletedRows = kondisiSDDetail::where('kondisiSDMaster_id', $xdj)->delete();
      return redirect('/pendidikan/kondisiSD');
    }

    public function dataDetail(Request $req)
    {
      $model = new detailSDRusak;
      if (!is_null($req->kec) && !is_null($req->nama) && !is_null($req->lokasi) && !is_null($req->deskrib)) {
        
        $model->detail_id = $req->kec;
        $model->nmaSekolah = $req->nama;
        $model->titik = $req->lokasi;
        $model->deskrib = $req->deskrib;
        $model->save();
        $data = ['execute' => true, 'access' => $model->id];
      }
      else{
        $data = ['execute' => false, 'message' => 'Lengkapi Data'];
      }

      echo json_encode(['respon' => $data]);
    }

    public function detail($id)
    {
      $model = kondisiSDMaster::where('ta',$id)->first();
      echo view('pendidikan.kondisiSD.detail',['ta' =>$id,'data' => $model,'no' =>1 ]);
    }

    public function dataImage(Request $req)
    {
      
      $ft = new fotoKerusakan;
      $ft->id_lokasi = $req->access;
      $ft->dari = 'sd';
      $file = $req->file('file');
      if (!is_null($file)) {
        $nm = $file->store('public/files');
        $ft->foto = $nm;
      }
      $ft->save();
    }

}
