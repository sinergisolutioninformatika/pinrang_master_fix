<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Walidata;
class WelcomeController extends Controller{
	public function index()
	{
		echo view('welcome',[
			'kat_1' => Walidata::where('kategori_id',1)->count(),
			'kat_2' => Walidata::where('kategori_id',2)->count(),
			'kat_3' => Walidata::where('kategori_id',3)->count(),
			'kat_4' => Walidata::where('kategori_id',4)->count(),
		]);
		// echo "string";
	}
}
