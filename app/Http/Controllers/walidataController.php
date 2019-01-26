<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use View;
use App\Models\kategori;
use App\Models\skpd;
use App\Models\admin\walidata;


class walidataController extends Controller
{
    public function index(Request $request) {
      $kodeSKPD=$request->session()->get('kodeSKPD');
      $namaSKPD=$request->session()->get('namaSKPD');
      $ta=$request->session()->get('tahun_anggaran');
      View::share('kodeSKPD',$kodeSKPD);
      View::share('skpd',$namaSKPD);
      View::share('ta',$ta);
      $skpd = skpd::all();
      $dataMaster = DB::table('skpd')
                      ->join('walidata','skpd.id','=','walidata.skpd_id')
                      ->select('walidata.*','skpd.nmaSKPD')->orderBy('walidata.id','desc')
                      ->paginate(10);
      return view('/admin/home',['kantor'=>$skpd, 'dataMaster'=> $dataMaster]);
    }

    public function create(Request $request)
    {
      $kondi = walidata::create([
        'id' => $request->id,
        'skpd_id' => $request->skpd_id,
        'nmaData' => $request->nmaData,
        'kategori_id' => $request->kategori,
        'keterangan' => $request->keterangan,
        'link_view' => $request->linkview,
        'link_admin' => $request->linkadmin,
        'tag' => $request->tag
      ]);
      return redirect('/walidata');
    }

    public function edit(Request $request, $kodeEdit)
    {
      $kodeSKPD=$request->session()->get('kodeSKPD');
      $namaSKPD=$request->session()->get('namaSKPD');
      $ta=$request->session()->get('tahun_anggaran');
      View::share('kodeSKPD',$kodeSKPD);
      View::share('skpd',$namaSKPD);
      View::share('ta',$ta);
      $skpd = skpd::all();
      $kategori = kategori::all();
      $dataMaster = DB::table('skpd')
                      ->join('walidata','skpd.id','=','walidata.skpd_id')
                      ->select('walidata.*','skpd.nmaSKPD')->orderBy('walidata.id','desc')
                      ->paginate(10);
      $dataEdit = walidata::where('id','=',$kodeEdit)->get();
      return view('/admin/edit',['kantor'=>$skpd,
                                 'kategori'=>$kategori,
                                  'dataMaster'=> $dataMaster,
                                  'kodeEdit'=>$kodeEdit,
                                  'dataEdit'=>$dataEdit]);
    }
    public function update(Request $request, $kodeEdit)
    {
      $update_dataMaster = walidata::find($kodeEdit);
      $update_dataMaster->skpd_id=$request->skpd_id;
      $update_dataMaster->nmaData=$request->nmaData;
      $update_dataMaster->kategori_id=$request->kategori;
      $update_dataMaster->keterangan=$request->keterangan;
      $update_dataMaster->link_view=$request->linkview;
      $update_dataMaster->link_admin=$request->linkadmin;
      $update_dataMaster->tag=$request->tag;
      $update_dataMaster->save();

      return back();
    }
}
