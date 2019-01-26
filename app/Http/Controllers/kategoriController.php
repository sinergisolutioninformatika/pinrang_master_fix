<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\walidata;

class kategoriController extends Controller
{
  // public function index()
  // {
  //   return view('kategori');
  // }
  public function showKategori($id)
  {
    $dataKategori = walidata::join('skpd','skpd.id','=','skpd_id')
                            ->where('kategori_id','=',$id)
                            ->paginate(7);
    return view('kategori',['dataKategori'=>$dataKategori]);
  }
  
  public function search(Request $request)
  {
    $dataSearch = walidata::join('skpd','skpd.id','=','skpd_id')
                            ->where('tag','like','%'.$request->search.'%')
                            ->orWhere('nmaData','like','%'.$request->search.'%')
                            ->paginate(10);
    return view('search',['dataSearch'=>$dataSearch]);
  }
}
