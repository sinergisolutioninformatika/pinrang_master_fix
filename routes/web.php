<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@index');

Route::get('/map',function()
{
  return view('map/map');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'kategoriController@search');
Route::get('/kategori/{id}', 'kategoriController@showKategori');

Route::get('/kependudukan/kartukeluarga/view', 'kartukeluargaController@view');
Route::get('/kependudukan/kawin/view', 'kawinController@view');
Route::get('/kependudukan/kelahiran/view', 'kelahiranController@view');
Route::get('/kependudukan/penduduk/view', 'pendudukController@view');

Route::get('/kesehatan/giziburuk/view', 'giziburukController@view');
Route::get('/kesehatan/jamkes/view', 'jamkesController@view');
Route::get('/kesehatan/jamkes/detail/{kode}', 'jamkesController@detail');

Route::get('/koperasi/umkm/view', 'umkmController@view');
Route::get('/koperasi/umkm/detail/{kode}', 'umkmController@detail');
Route::get('/koperasi/perbankan/view', 'perbankanController@view');

Route::get('/nakertrans/naker/view', 'nakerController@view');
Route::get('/nakertrans/pencaker/view', 'pencakerController@view');
Route::get('/nakertrans/transmigrasi/view', 'transmigrasiController@view');

Route::get('/pendidikan/guruHonor/view', 'guruHonorController@view');
Route::get('/pendidikan/guruPNS/view', 'guruPNSController@view');
Route::get('/pendidikan/guruSertifikat/view', 'guruSertifikatController@view');
Route::get('/pendidikan/kondisiPAUD/view', 'kondisiPAUDController@view');
Route::get('/pendidikan/kondisiPAUD/detail/{kode}', 'kondisiPAUDController@detail');
Route::get('/pendidikan/kondisiSD/view', 'kondisiSDController@view');
Route::post('/pendidikan/kondisiSD/dataDetail', 'kondisiSDController@dataDetail');
Route::post('/pendidikan/kondisiSD/dataImage', 'kondisiSDController@dataImage');
Route::get('/pendidikan/kondisiSD/detail/{kode}', 'kondisiSDController@detail');
Route::get('/pendidikan/kondisiSMP/view', 'kondisiSMPController@view');
Route::get('/pendidikan/kondisiSMP/detail/{kode}', 'kondisiSMPController@detail');
Route::get('/pendidikan/kondisiTK/view', 'kondisiTKController@view');
Route::get('/pendidikan/kondisiTK/detail/{kode}', 'kondisiTKController@detail');
Route::get('/pendidikan/siswaSD/detail/{kode}', 'siswaSDController@detail');
Route::get('/pendidikan/siswaSD/view', 'siswaSDController@view');
Route::get('/pendidikan/siswaSMP/view', 'siswaSMPController@view');
Route::get('/pendidikan/siswaSMP/detail/{kode}', 'siswaSMPController@detail');
Route::get('/pendidikan/siswaTK/view', 'siswaTKController@view');
Route::get('/pendidikan/siswaTK/detail/{kode}', 'siswaTKController@detail');

Route::get('/perhubungan/fasjal/view', 'fasjalController@view');
Route::get('/perhubungan/lakalantas/view', 'lakalantasController@view');
Route::get('/perhubungan/ujikendaraan/view', 'ujikendaraanController@view');

Route::get('/perikanan/armada/view', 'armadaController@view');
Route::get('/perikanan/budidaya/view', 'budidayaController@view');
Route::get('/perikanan/ikanasin/view', 'ikanasinController@view');
Route::get('/perikanan/ikanasin/detail/{kode}', 'ikanasinController@detail');
Route::get('/perikanan/ikansegar/view', 'ikansegarController@view');
Route::get('/perikanan/ikansegar/detail/{kode}', 'ikansegarController@detail');
Route::get('/perikanan/nelayan/view', 'nelayanController@view');
Route::get('/perikanan/produksiikan/view', 'produksiikanController@view');

Route::get('/perkebunan/kebunAren/view', 'kebunArenController@view');
Route::get('/perkebunan/kebunCengkeh/view', 'kebunCengkehController@view');
Route::get('/perkebunan/kebunJambumete/view', 'kebunJambumeteController@view');
Route::get('/perkebunan/kebunKakao/view', 'kebunKakaoController@view');
Route::get('/perkebunan/kebunKapuk/view', 'kebunKapukController@view');
Route::get('/perkebunan/kebunKelapadalam/view', 'kebunKelapadalamController@view');
Route::get('/perkebunan/kebunKelapahybrida/view', 'kebunKelapahybridaController@view');
Route::get('/perkebunan/kebunKelapasawit/view', 'kebunKelapasawitController@view');
Route::get('/perkebunan/kebunKemiri/view', 'kebunKemiriController@view');
Route::get('/perkebunan/kebunKopiarabika/view', 'kebunKopiarabikaController@view');
Route::get('/perkebunan/kebunKopirobusta/view', 'kebunKopirobustaController@view');
Route::get('/perkebunan/kebunLada/view', 'kebunLadaController@view');
Route::get('/perkebunan/kebunNilam/view', 'kebunNilamController@view');
Route::get('/perkebunan/kebunPala/view', 'kebunPalaController@view');
Route::get('/perkebunan/kebunPanili/view', 'kebunPaniliController@view');
Route::get('/perkebunan/kebunPinang/view', 'kebunPinangController@view');

Route::get('/pertanian/jagung/view', 'jagungController@view');
Route::get('/pertanian/jagung/detail', 'jagungController@detail');
Route::get('/pertanian/kacanghijau/view', 'kacanghijauController@view');
Route::get('/pertanian/kacangtanah/view', 'kacangtanahController@view');
Route::get('/pertanian/kedelai/view', 'kedelaiController@view');
Route::get('/pertanian/padi/view', 'padiController@view');
Route::get('/pertanian/padi/detail/{kode}', 'padiController@detail');
Route::get('/pertanian/sawah/view', 'sawahController@view');
Route::get('/pertanian/sawah/detail/{kode}', 'sawahController@detail');
Route::get('/pertanian/ubijalar/view', 'ubijalarController@view');
Route::get('/pertanian/ubikayu/view', 'ubikayuController@view');

Route::get('/peternakan/ternakAyamburas/view', 'ternakAyamburasController@view');
Route::get('/peternakan/ternakAyamraspedaging/view', 'ternakAyamraspedagingController@view');
Route::get('/peternakan/ternakAyamraspetelur/view', 'ternakAyamraspetelurController@view');
Route::get('/peternakan/ternakBabi/view', 'ternakBabiController@view');
Route::get('/peternakan/ternakDomba/view', 'ternakDombaController@view');
Route::get('/peternakan/ternakItik/view', 'ternakItikController@view');
Route::get('/peternakan/ternakKambing/view', 'ternakKambingController@view');
Route::get('/peternakan/ternakKerbau/view', 'ternakKerbauController@view');
Route::get('/peternakan/ternakKuda/view', 'ternakKudaController@view');
Route::get('/peternakan/ternakSapiperah/view', 'ternakSapiperahController@view');
Route::get('/peternakan/ternakSapipotong/view', 'ternakSapipotongController@view');

Route::get('/psda/irigasi/view', 'irigasiController@view');
Route::get('/psda/irigasi/detail/{kode}', 'irigasiController@detail');
Route::get('/psda/luassawah/view', 'luassawahController@view');
Route::get('/psda/luassawah/detail/{kode}', 'luassawahController@detail');

Route::get('/kominfo/telekomunikasi/view', 'telekomunikasiController@view');
Route::get('/kominfo/pos/view', 'posController@view');
Route::get('/kominfo/pos/detail/{kode}', 'posController@detail');
Route::get('/kominfo/internet/view', 'internetController@view');

Route::get('/sosial/bencana/view', 'bencanaController@view');
Route::get('/sosial/bencana/detail/{kode}', 'bencanaController@detail');
Route::get('/sosial/masalahsosial/view', 'masalahsosialController@view');



// Route::group(['middleware'=>'bisalogin'], function(){
  Route::get('/walidata', 'walidataController@index');
  Route::post('/walidata/create', 'walidataController@create');
  Route::get('/walidata/edit/{id}', 'walidataController@edit');
  Route::put('/walidata/update/{id}', 'walidataController@update');
  Route::delete('/walidata/destroy/{id}', 'walidataController@destroy');
  // pendidikan/kondisiSD
  Route::get('/pendidikan/kondisiSD', 'kondisiSDController@index');
  Route::post('/pendidikan/kondisiSD/store', 'kondisiSDController@store');
  Route::get('/pendidikan/kondisiSD/edit/{id}', 'kondisiSDController@edit');
  Route::put('/pendidikan/kondisiSD/update/{id}', 'kondisiSDController@update');
  Route::delete('/pendidikan/kondisiSD/destroy/{id}', 'kondisiSDController@destroy');
  // pendidikan/kondisiSMP
  Route::get('/pendidikan/kondisiSMP', 'kondisiSMPController@index');
  Route::post('/pendidikan/kondisiSMP/store', 'kondisiSMPController@store');
  Route::get('/pendidikan/kondisiSMP/edit/{id}', 'kondisiSMPController@edit');
  Route::put('/pendidikan/kondisiSMP/update/{id}', 'kondisiSMPController@update');
  Route::delete('/pendidikan/kondisiSMP/destroy/{id}', 'kondisiSMPController@destroy');
  // pendidikan/kondisiTK
  Route::get('/pendidikan/kondisiTK', 'kondisiTKController@index');
  Route::post('/pendidikan/kondisiTK/store', 'kondisiTKController@store');
  Route::get('/pendidikan/kondisiTK/edit/{id}', 'kondisiTKController@edit');
  Route::put('/pendidikan/kondisiTK/update/{id}', 'kondisiTKController@update');
  Route::delete('/pendidikan/kondisiTK/destroy/{id}', 'kondisiTKController@destroy');
  // pendidikan/kondisiPAUD
  Route::get('/pendidikan/kondisiPAUD', 'kondisiPAUDController@index');
  Route::post('/pendidikan/kondisiPAUD/store', 'kondisiPAUDController@store');
  Route::get('/pendidikan/kondisiPAUD/edit/{id}', 'kondisiPAUDController@edit');
  Route::put('/pendidikan/kondisiPAUD/update/{id}', 'kondisiPAUDController@update');
  Route::delete('/pendidikan/kondisiPAUD/destroy/{id}', 'kondisiPAUDController@destroy');
  // pendidikan/guruPNS
  Route::get('/pendidikan/guruPNS', 'guruPNSController@index');
  Route::get('/pendidikan/guruPNS/detail/{kode}', 'guruPNSController@detail');
  Route::post('/pendidikan/guruPNS/store', 'guruPNSController@store');
  Route::get('/pendidikan/guruPNS/edit/{id}', 'guruPNSController@edit');
  Route::put('/pendidikan/guruPNS/update/{id}', 'guruPNSController@update');
  Route::delete('/pendidikan/guruPNS/destroy/{id}', 'guruPNSController@destroy');
  // pendidikan/guruHonor
  Route::get('/pendidikan/guruHonor', 'guruHonorController@index');
  Route::get('/pendidikan/guruHonor/detail/{kode}', 'guruHonorController@detail');
  Route::post('/pendidikan/guruHonor/store', 'guruHonorController@store');
  Route::get('/pendidikan/guruHonor/edit/{id}', 'guruHonorController@edit');
  Route::put('/pendidikan/guruHonor/update/{id}', 'guruHonorController@update');
  Route::delete('/pendidikan/guruHonor/destroy/{id}', 'guruHonorController@destroy');
  // pendidikan/guruSertifikat
  Route::get('/pendidikan/guruSertifikat', 'guruSertifikatController@index');
  Route::get('/pendidikan/guruSertifikat/detail/{kode}', 'guruSertifikatController@detail');
  Route::post('/pendidikan/guruSertifikat/store', 'guruSertifikatController@store');
  Route::get('/pendidikan/guruSertifikat/edit/{id}', 'guruSertifikatController@edit');
  Route::put('/pendidikan/guruSertifikat/update/{id}', 'guruSertifikatController@update');
  Route::delete('/pendidikan/guruSertifikat/destroy/{id}', 'guruSertifikatController@destroy');
  // pendidikan/siswaTK
  Route::get('/pendidikan/siswaTK', 'siswaTKController@index');
  Route::post('/pendidikan/siswaTK/store', 'siswaTKController@store');
  Route::get('/pendidikan/siswaTK/edit/{id}', 'siswaTKController@edit');
  Route::put('/pendidikan/siswaTK/update/{id}', 'siswaTKController@update');
  Route::delete('/pendidikan/siswaTK/destroy/{id}', 'siswaTKController@destroy');
  // pendidikan/siswaSD
  Route::get('/pendidikan/siswaSD', 'siswaSDController@index');
  Route::post('/pendidikan/siswaSD/store', 'siswaSDController@store');
  Route::get('/pendidikan/siswaSD/edit/{id}', 'siswaSDController@edit');
  Route::put('/pendidikan/siswaSD/update/{id}', 'siswaSDController@update');
  Route::delete('/pendidikan/siswaSD/destroy/{id}', 'siswaSDController@destroy');
  // pendidikan/siswaSMP
  Route::get('/pendidikan/siswaSMP', 'siswaSMPController@index');
  Route::post('/pendidikan/siswaSMP/store', 'siswaSMPController@store');
  Route::get('/pendidikan/siswaSMP/edit/{id}', 'siswaSMPController@edit');
  Route::put('/pendidikan/siswaSMP/update/{id}', 'siswaSMPController@update');
  Route::delete('/pendidikan/siswaSMP/destroy/{id}', 'siswaSMPController@destroy');
  // kependudukan/penduduk
  Route::get('/kependudukan/penduduk', 'pendudukController@index');
  Route::get('/kependudukan/penduduk/detail/{kode}', 'pendudukController@detail');
  Route::post('/kependudukan/penduduk/store', 'pendudukController@store');
  Route::get('/kependudukan/penduduk/edit/{id}', 'pendudukController@edit');
  Route::put('/kependudukan/penduduk/update/{id}', 'pendudukController@update');
  Route::delete('/kependudukan/penduduk/destroy/{id}', 'pendudukController@destroy');
  // kependudukan/kartukeluarga
  Route::get('/kependudukan/kartukeluarga', 'kartukeluargaController@index');
  Route::get('/kependudukan/kartukeluarga/detail/{kode}', 'kartukeluargaController@detail');
  Route::post('/kependudukan/kartukeluarga/store', 'kartukeluargaController@store');
  Route::get('/kependudukan/kartukeluarga/edit/{id}', 'kartukeluargaController@edit');
  Route::put('/kependudukan/kartukeluarga/update/{id}', 'kartukeluargaController@update');
  Route::delete('/kependudukan/kartukeluarga/destroy/{id}', 'kartukeluargaController@destroy');
  // kependudukan/kalahiran
  Route::get('/kependudukan/kelahiran', 'kelahiranController@index');
  Route::get('/kependudukan/kelahiran/detail/{kode}', 'kelahiranController@detail');
  Route::post('/kependudukan/kelahiran/store', 'kelahiranController@store');
  Route::get('/kependudukan/kelahiran/edit/{id}', 'kelahiranController@edit');
  Route::put('/kependudukan/kelahiran/update/{id}', 'kelahiranController@update');
  Route::delete('/kependudukan/kelahiran/destroy/{id}', 'kelahiranController@destroy');
  // kependudukan/perkawinan
  Route::get('/kependudukan/kawin', 'kawinController@index');
  Route::get('/kependudukan/kawin/detail/{kode}', 'kawinController@detail');
  Route::post('/kependudukan/kawin/store', 'kawinController@store');
  Route::get('/kependudukan/kawin/edit/{id}', 'kawinController@edit');
  Route::put('/kependudukan/kawin/update/{id}', 'kawinController@update');
  Route::delete('/kependudukan/kawin/destroy/{id}', 'kawinController@destroy');
  // kesehatan/penyakit10
  Route::get('/kesehatan/penyakit10', 'penyakit10Controller@index');
  Route::post('/kesehatan/penyakit10/store', 'penyakit10Controller@store');
  Route::get('/kesehatan/penyakit10/edit/{id}', 'penyakit10Controller@edit');
  Route::put('/kesehatan/penyakit10/update/{id}', 'penyakit10Controller@update');
  Route::delete('/kesehatan/penyakit10/destroy/{id}', 'penyakit10Controller@destroy');
  // kesehatan/jamkes
  Route::get('/kesehatan/jamkes', 'jamkesController@index');
  Route::post('/kesehatan/jamkes/store', 'jamkesController@store');
  Route::get('/kesehatan/jamkes/edit/{id}', 'jamkesController@edit');
  Route::put('/kesehatan/jamkes/update/{id}', 'jamkesController@update');
  Route::delete('/kesehatan/jamkes/destroy/{id}', 'jamkesController@destroy');
  // kesehatan/giziburuk
  Route::get('/kesehatan/giziburuk', 'giziburukController@index');
  Route::get('/kesehatan/giziburuk/detail/{kode}', 'giziburukController@detail');
  Route::post('/kesehatan/giziburuk/store', 'giziburukController@store');
  Route::get('/kesehatan/giziburuk/edit/{id}', 'giziburukController@edit');
  Route::put('/kesehatan/giziburuk/update/{id}', 'giziburukController@update');
  Route::delete('/kesehatan/giziburuk/destroy/{id}', 'giziburukController@destroy');
  //psda/luassawah
  Route::get('/psda/luassawah', 'luassawahController@index');
  Route::post('/psda/luassawah/store', 'luassawahController@store');
  Route::get('/psda/luassawah/edit/{id}', 'luassawahController@edit');
  Route::put('/psda/luassawah/update/{id}', 'luassawahController@update');
  Route::delete('/psda/luassawah/destroy/{id}', 'luassawahController@destroy');
  Route::get('/psda/luassawah/show', 'luassawahController@show');
  //psda/irigasi
  Route::get('/psda/irigasi', 'irigasiController@index');
  Route::post('/psda/irigasi/store', 'irigasiController@store');
  Route::get('/psda/irigasi/edit/{id}', 'irigasiController@edit');
  Route::put('/psda/irigasi/update/{id}', 'irigasiController@update');
  Route::delete('/psda/irigasi/destroy/{id}', 'irigasiController@destroy');
  //ppkb/kbaktif
  Route::get('/ppkb/kbaktif', 'kbaktifController@index');
  Route::get('/ppkb/kbaktif/view', 'kbaktifController@view');
  Route::get('/ppkb/kbaktif/detail/{kode}', 'kbaktifController@detail');
  Route::post('/ppkb/kbaktif/store', 'kbaktifController@store');
  Route::get('/ppkb/kbaktif/edit/{id}', 'kbaktifController@edit');
  Route::put('/ppkb/kbaktif/update/{id}', 'kbaktifController@update');
  Route::delete('/ppkb/kbaktif/destroy/{id}', 'kbaktifController@destroy');
  //koperasi/umkm
  Route::get('/koperasi/umkm', 'umkmController@index');
  Route::post('/koperasi/umkm/store', 'umkmController@store');
  Route::get('/koperasi/umkm/edit/{id}', 'umkmController@edit');
  Route::put('/koperasi/umkm/update/{id}', 'umkmController@update');
  Route::delete('/koperasi/umkm/destroy/{id}', 'umkmController@destroy');
  //koperasi/perbankan
  Route::get('/koperasi/perbankan', 'perbankanController@index');
  Route::post('/koperasi/perbankan/store', 'perbankanController@store');
  Route::get('/koperasi/perbankan/edit/{id}', 'perbankanController@edit');
  Route::put('/koperasi/perbankan/update/{id}', 'perbankanController@update');
  Route::delete('/koperasi/perbankan/destroy/{id}', 'perbankanController@destroy');
  //pertanian/sawah
  Route::get('/pertanian/sawah', 'sawahController@index');
  Route::post('/pertanian/sawah/store', 'sawahController@store');
  Route::get('/pertanian/sawah/edit/{id}', 'sawahController@edit');
  Route::put('/pertanian/sawah/update/{id}', 'sawahController@update');
  Route::delete('/pertanian/sawah/destroy/{id}', 'sawahController@destroy');
  //pertanian/padi
  Route::get('/pertanian/padi', 'padiController@index');
  Route::post('/pertanian/padi/store', 'padiController@store');
  Route::get('/pertanian/padi/edit/{id}', 'padiController@edit');
  Route::put('/pertanian/padi/update/{id}', 'padiController@update');
  Route::delete('/pertanian/padi/destroy/{id}', 'padiController@destroy');
  //pertanian/jagung
  Route::get('/pertanian/jagung', 'jagungController@index');
  Route::get('/pertanian/jagung/detail', 'jagungController@detail');
  Route::post('/pertanian/jagung/store', 'jagungController@store');
  Route::get('/pertanian/jagung/edit/{id}', 'jagungController@edit');
  Route::put('/pertanian/jagung/update/{id}', 'jagungController@update');
  Route::delete('/pertanian/jagung/destroy/{id}', 'jagungController@destroy');
  //pertanian/kedelai
  Route::get('/pertanian/kedelai', 'kedelaiController@index');
  Route::get('/pertanian/kedelai/detail/{kode}', 'kedelaiController@detail');
  Route::post('/pertanian/kedelai/store', 'kedelaiController@store');
  Route::get('/pertanian/kedelai/edit/{id}', 'kedelaiController@edit');
  Route::put('/pertanian/kedelai/update/{id}', 'kedelaiController@update');
  Route::delete('/pertanian/kedelai/destroy/{id}', 'kedelaiController@destroy');
  //pertanian/kacangtanah
  Route::get('/pertanian/kacangtanah', 'kacangtanahController@index');
  Route::get('/pertanian/kacangtanah/detail/{kode}', 'kacangtanahController@detail');
  Route::post('/pertanian/kacangtanah/store', 'kacangtanahController@store');
  Route::get('/pertanian/kacangtanah/edit/{id}', 'kacangtanahController@edit');
  Route::put('/pertanian/kacangtanah/update/{id}', 'kacangtanahController@update');
  Route::delete('/pertanian/kacangtanah/destroy/{id}', 'kacangtanahController@destroy');
  //pertanian/kacanghijau
  Route::get('/pertanian/kacanghijau', 'kacanghijauController@index');
  Route::get('/pertanian/kacanghijau/detail/{kode}', 'kacanghijauController@detail');
  Route::post('/pertanian/kacanghijau/store', 'kacanghijauController@store');
  Route::get('/pertanian/kacanghijau/edit/{id}', 'kacanghijauController@edit');
  Route::put('/pertanian/kacanghijau/update/{id}', 'kacanghijauController@update');
  Route::delete('/pertanian/kacanghijau/destroy/{id}', 'kacanghijauController@destroy');
  //pertanian/ubikayu
  Route::get('/pertanian/ubikayu', 'ubikayuController@index');
  Route::get('/pertanian/ubikayu/detail/{kode}', 'ubikayuController@detail');
  Route::post('/pertanian/ubikayu/store', 'ubikayuController@store');
  Route::get('/pertanian/ubikayu/edit/{id}', 'ubikayuController@edit');
  Route::put('/pertanian/ubikayu/update/{id}', 'ubikayuController@update');
  Route::delete('/pertanian/ubikayu/destroy/{id}', 'ubikayuController@destroy');
  //pertanian/ubijalar
  Route::get('/pertanian/ubijalar', 'ubijalarController@index');
  Route::get('/pertanian/ubijalar/detail/{kode}', 'ubijalarController@detail');
  Route::post('/pertanian/ubijalar/store', 'ubijalarController@store');
  Route::get('/pertanian/ubijalar/edit/{id}', 'ubijalarController@edit');
  Route::put('/pertanian/ubijalar/update/{id}', 'ubijalarController@update');
  Route::delete('/pertanian/ubijalar/destroy/{id}', 'ubijalarController@destroy');
  //perikanan/nelayan
  Route::get('/perikanan/nelayan', 'nelayanController@index');
  Route::get('/perikanan/nelayan/detail/{kode}', 'nelayanController@detail');
  Route::post('/perikanan/nelayan/store', 'nelayanController@store');
  Route::get('/perikanan/nelayan/edit/{id}', 'nelayanController@edit');
  Route::put('/perikanan/nelayan/update/{id}', 'nelayanController@update');
  Route::delete('/perikanan/nelayan/destroy/{id}', 'nelayanController@destroy');
  //perikanan/armada
  Route::get('/perikanan/armada', 'armadaController@index');
  Route::get('/perikanan/armada/detail/{kode}', 'armadaController@detail');
  Route::post('/perikanan/armada/store', 'armadaController@store');
  Route::get('/perikanan/armada/edit/{id}', 'armadaController@edit');
  Route::put('/perikanan/armada/update/{id}', 'armadaController@update');
  Route::delete('/perikanan/armada/destroy/{id}', 'armadaController@destroy');
  //perikanan/budidaya
  Route::get('/perikanan/budidaya', 'budidayaController@index');
  Route::get('/perikanan/budidaya/detail/{kode}', 'budidayaController@detail');
  Route::post('/perikanan/budidaya/store', 'budidayaController@store');
  Route::get('/perikanan/budidaya/edit/{id}', 'budidayaController@edit');
  Route::put('/perikanan/budidaya/update/{id}', 'budidayaController@update');
  Route::delete('/perikanan/budidaya/destroy/{id}', 'budidayaController@destroy');
  //perikanan/produksiikan
  Route::get('/perikanan/produksiikan', 'produksiikanController@index');
  Route::get('/perikanan/produksiikan/detail/{kode}', 'produksiikanController@detail');
  Route::post('/perikanan/produksiikan/store', 'produksiikanController@store');
  Route::get('/perikanan/produksiikan/edit/{id}', 'produksiikanController@edit');
  Route::put('/perikanan/produksiikan/update/{id}', 'produksiikanController@update');
  Route::delete('/perikanan/produksiikan/destroy/{id}', 'produksiikanController@destroy');
  //perikanan/ikanasin
  Route::get('/perikanan/ikanasin', 'ikanasinController@index');
  Route::post('/perikanan/ikanasin/store', 'ikanasinController@store');
  Route::get('/perikanan/ikanasin/edit/{id}', 'ikanasinController@edit');
  Route::put('/perikanan/ikanasin/update/{id}', 'ikanasinController@update');
  Route::delete('/perikanan/ikanasin/destroy/{id}', 'ikanasinController@destroy');
  //perikanan/ikansegar
  Route::get('/perikanan/ikansegar', 'ikansegarController@index');
  Route::post('/perikanan/ikansegar/store', 'ikansegarController@store');
  Route::get('/perikanan/ikansegar/edit/{id}', 'ikansegarController@edit');
  Route::put('/perikanan/ikansegar/update/{id}', 'ikansegarController@update');
  Route::delete('/perikanan/ikansegar/destroy/{id}', 'ikansegarController@destroy');
  //peternakan/ternakKerbau
  Route::get('/peternakan/ternakKerbau', 'ternakKerbauController@index');
  Route::post('/peternakan/ternakKerbau/store', 'ternakKerbauController@store');
  Route::get('/peternakan/ternakKerbau/edit/{id}', 'ternakKerbauController@edit');
  Route::put('/peternakan/ternakKerbau/update/{id}', 'ternakKerbauController@update');
  Route::delete('/peternakan/ternakKerbau/destroy/{id}', 'ternakKerbauController@destroy');
  //peternakan/ternakKuda
  Route::get('/peternakan/ternakKuda', 'ternakKudaController@index');
  Route::post('/peternakan/ternakKuda/store', 'ternakKudaController@store');
  Route::get('/peternakan/ternakKuda/edit/{id}', 'ternakKudaController@edit');
  Route::put('/peternakan/ternakKuda/update/{id}', 'ternakKudaController@update');
  Route::delete('/peternakan/ternakKuda/destroy/{id}', 'ternakKudaController@destroy');
  //peternakan/Sapipotong
  Route::get('/peternakan/ternakSapipotong', 'ternakSapipotongController@index');
  Route::post('/peternakan/ternakSapipotong/store', 'ternakSapipotongController@store');
  Route::get('/peternakan/ternakSapipotong/edit/{id}', 'ternakSapipotongController@edit');
  Route::put('/peternakan/ternakSapipotong/update/{id}', 'ternakSapipotongController@update');
  Route::delete('/peternakan/ternakSapipotong/destroy/{id}', 'ternakSapipotongController@destroy');
  //peternakan/Sapiperah
  Route::get('/peternakan/ternakSapiperah', 'ternakSapiperahController@index');
  Route::post('/peternakan/ternakSapiperah/store', 'ternakSapiperahController@store');
  Route::get('/peternakan/ternakSapiperah/edit/{id}', 'ternakSapiperahController@edit');
  Route::put('/peternakan/ternakSapiperah/update/{id}', 'ternakSapiperahController@update');
  Route::delete('/peternakan/ternakSapiperah/destroy/{id}', 'ternakSapiperahController@destroy');
  //peternakan/Babi
  Route::get('/peternakan/ternakBabi', 'ternakBabiController@index');
  Route::post('/peternakan/ternakBabi/store', 'ternakBabiController@store');
  Route::get('/peternakan/ternakBabi/edit/{id}', 'ternakBabiController@edit');
  Route::put('/peternakan/ternakBabi/update/{id}', 'ternakBabiController@update');
  Route::delete('/peternakan/ternakBabi/destroy/{id}', 'ternakBabiController@destroy');
  //peternakan/Domba
  Route::get('/peternakan/ternakDomba', 'ternakDombaController@index');
  Route::post('/peternakan/ternakDomba/store', 'ternakDombaController@store');
  Route::get('/peternakan/ternakDomba/edit/{id}', 'ternakDombaController@edit');
  Route::put('/peternakan/ternakDomba/update/{id}', 'ternakDombaController@update');
  Route::delete('/peternakan/ternakDomba/destroy/{id}', 'ternakDombaController@destroy');
  //peternakan/Kambing
  Route::get('/peternakan/ternakKambing', 'ternakKambingController@index');
  Route::post('/peternakan/ternakKambing/store', 'ternakKambingController@store');
  Route::get('/peternakan/ternakKambing/edit/{id}', 'ternakKambingController@edit');
  Route::put('/peternakan/ternakKambing/update/{id}', 'ternakKambingController@update');
  Route::delete('/peternakan/ternakKambing/destroy/{id}', 'ternakKambingController@destroy');
  //peternakan/Ayamburas
  Route::get('/peternakan/ternakAyamburas', 'ternakAyamburasController@index');
  Route::post('/peternakan/ternakAyamburas/store', 'ternakAyamburasController@store');
  Route::get('/peternakan/ternakAyamburas/edit/{id}', 'ternakAyamburasController@edit');
  Route::put('/peternakan/ternakAyamburas/update/{id}', 'ternakAyamburasController@update');
  Route::delete('/peternakan/ternakAyamburas/destroy/{id}', 'ternakAyamburasController@destroy');
  //peternakan/Ayamraspedaging
  Route::get('/peternakan/ternakAyamraspedaging', 'ternakAyamraspedagingController@index');
  Route::post('/peternakan/ternakAyamraspedaging/store', 'ternakAyamraspedagingController@store');
  Route::get('/peternakan/ternakAyamraspedaging/edit/{id}', 'ternakAyamraspedagingController@edit');
  Route::put('/peternakan/ternakAyamraspedaging/update/{id}', 'ternakAyamraspedagingController@update');
  Route::delete('/peternakan/ternakAyamraspedaging/destroy/{id}', 'ternakAyamraspedagingController@destroy');
  //peternakan/Ayamraspetelur
  Route::get('/peternakan/ternakAyamraspetelur', 'ternakAyamraspetelurController@index');
  Route::post('/peternakan/ternakAyamraspetelur/store', 'ternakAyamraspetelurController@store');
  Route::get('/peternakan/ternakAyamraspetelur/edit/{id}', 'ternakAyamraspetelurController@edit');
  Route::put('/peternakan/ternakAyamraspetelur/update/{id}', 'ternakAyamraspetelurController@update');
  Route::delete('/peternakan/ternakAyamraspetelur/destroy/{id}', 'ternakAyamraspetelurController@destroy');
  //peternakan/Itik
  Route::get('/peternakan/ternakItik', 'ternakItikController@index');
  Route::post('/peternakan/ternakItik/store', 'ternakItikController@store');
  Route::get('/peternakan/ternakItik/edit/{id}', 'ternakItikController@edit');
  Route::put('/peternakan/ternakItik/update/{id}', 'ternakItikController@update');
  Route::delete('/peternakan/ternakItik/destroy/{id}', 'ternakItikController@destroy');
  //perkebunan/Kelapadalam
  Route::get('/perkebunan/kebunKelapadalam', 'kebunKelapadalamController@index');
  Route::post('/perkebunan/kebunKelapadalam/store', 'kebunKelapadalamController@store');
  Route::get('/perkebunan/kebunKelapadalam/edit/{id}', 'kebunKelapadalamController@edit');
  Route::put('/perkebunan/kebunKelapadalam/update/{id}', 'kebunKelapadalamController@update');
  Route::delete('/perkebunan/kebunKelapadalam/destroy/{id}', 'kebunKelapadalamController@destroy');
  //perkebunan/Kelapahybrida
  Route::get('/perkebunan/kebunKelapahybrida', 'kebunKelapahybridaController@index');
  Route::post('/perkebunan/kebunKelapahybrida/store', 'kebunKelapahybridaController@store');
  Route::get('/perkebunan/kebunKelapahybrida/edit/{id}', 'kebunKelapahybridaController@edit');
  Route::put('/perkebunan/kebunKelapahybrida/update/{id}', 'kebunKelapahybridaController@update');
  Route::delete('/perkebunan/kebunKelapahybrida/destroy/{id}', 'kebunKelapahybridaController@destroy');
  //perkebunan/Kakao
  Route::get('/perkebunan/kebunKakao', 'kebunKakaoController@index');
  Route::post('/perkebunan/kebunKakao/store', 'kebunKakaoController@store');
  Route::get('/perkebunan/kebunKakao/edit/{id}', 'kebunKakaoController@edit');
  Route::put('/perkebunan/kebunKakao/update/{id}', 'kebunKakaoController@update');
  Route::delete('/perkebunan/kebunKakao/destroy/{id}', 'kebunKakaoController@destroy');
  //perkebunan/Kopirobusta
  Route::get('/perkebunan/kebunKopirobusta', 'kebunKopirobustaController@index');
  Route::post('/perkebunan/kebunKopirobusta/store', 'kebunKopirobustaController@store');
  Route::get('/perkebunan/kebunKopirobusta/edit/{id}', 'kebunKopirobustaController@edit');
  Route::put('/perkebunan/kebunKopirobusta/update/{id}', 'kebunKopirobustaController@update');
  Route::delete('/perkebunan/kebunKopirobusta/destroy/{id}', 'kebunKopirobustaController@destroy');
  //perkebunan/Kopiarabika
  Route::get('/perkebunan/kebunKopiarabika', 'kebunKopiarabikaController@index');
  Route::post('/perkebunan/kebunKopiarabika/store', 'kebunKopiarabikaController@store');
  Route::get('/perkebunan/kebunKopiarabika/edit/{id}', 'kebunKopiarabikaController@edit');
  Route::put('/perkebunan/kebunKopiarabika/update/{id}', 'kebunKopiarabikaController@update');
  Route::delete('/perkebunan/kebunKopiarabika/destroy/{id}', 'kebunKopiarabikaController@destroy');
  //perkebunan/Jambumete
  Route::get('/perkebunan/kebunJambumete', 'kebunJambumeteController@index');
  Route::post('/perkebunan/kebunJambumete/store', 'kebunJambumeteController@store');
  Route::get('/perkebunan/kebunJambumete/edit/{id}', 'kebunJambumeteController@edit');
  Route::put('/perkebunan/kebunJambumete/update/{id}', 'kebunJambumeteController@update');
  Route::delete('/perkebunan/kebunJambumete/destroy/{id}', 'kebunJambumeteController@destroy');
  //perkebunan/Kemiri
  Route::get('/perkebunan/kebunKemiri', 'kebunKemiriController@index');
  Route::post('/perkebunan/kebunKemiri/store', 'kebunKemiriController@store');
  Route::get('/perkebunan/kebunKemiri/edit/{id}', 'kebunKemiriController@edit');
  Route::put('/perkebunan/kebunKemiri/update/{id}', 'kebunKemiriController@update');
  Route::delete('/perkebunan/kebunKemiri/destroy/{id}', 'kebunKemiriController@destroy');
  //perkebunan/Cengkeh
  Route::get('/perkebunan/kebunCengkeh', 'kebunCengkehController@index');
  Route::post('/perkebunan/kebunCengkeh/store', 'kebunCengkehController@store');
  Route::get('/perkebunan/kebunCengkeh/edit/{id}', 'kebunCengkehController@edit');
  Route::put('/perkebunan/kebunCengkeh/update/{id}', 'kebunCengkehController@update');
  Route::delete('/perkebunan/kebunCengkeh/destroy/{id}', 'kebunCengkehController@destroy');
  //perkebunan/Lada
  Route::get('/perkebunan/kebunLada', 'kebunLadaController@index');
  Route::post('/perkebunan/kebunLada/store', 'kebunLadaController@store');
  Route::get('/perkebunan/kebunLada/edit/{id}', 'kebunLadaController@edit');
  Route::put('/perkebunan/kebunLada/update/{id}', 'kebunLadaController@update');
  Route::delete('/perkebunan/kebunLada/destroy/{id}', 'kebunLadaController@destroy');
  //perkebunan/Kapuk
  Route::get('/perkebunan/kebunKapuk', 'kebunKapukController@index');
  Route::post('/perkebunan/kebunKapuk/store', 'kebunKapukController@store');
  Route::get('/perkebunan/kebunKapuk/edit/{id}', 'kebunKapukController@edit');
  Route::put('/perkebunan/kebunKapuk/update/{id}', 'kebunKapukController@update');
  Route::delete('/perkebunan/kebunKapuk/destroy/{id}', 'kebunKapukController@destroy');
  //perkebunan/Panili
  Route::get('/perkebunan/kebunPanili', 'kebunPaniliController@index');
  Route::post('/perkebunan/kebunPanili/store', 'kebunPaniliController@store');
  Route::get('/perkebunan/kebunPanili/edit/{id}', 'kebunPaniliController@edit');
  Route::put('/perkebunan/kebunPanili/update/{id}', 'kebunPaniliController@update');
  Route::delete('/perkebunan/kebunPanili/destroy/{id}', 'kebunPaniliController@destroy');
  //perkebunan/Aren
  Route::get('/perkebunan/kebunAren', 'kebunArenController@index');
  Route::post('/perkebunan/kebunAren/store', 'kebunArenController@store');
  Route::get('/perkebunan/kebunAren/edit/{id}', 'kebunArenController@edit');
  Route::put('/perkebunan/kebunAren/update/{id}', 'kebunArenController@update');
  Route::delete('/perkebunan/kebunAren/destroy/{id}', 'kebunArenController@destroy');
  //perkebunan/Pinang
  Route::get('/perkebunan/kebunPinang', 'kebunPinangController@index');
  Route::post('/perkebunan/kebunPinang/store', 'kebunPinangController@store');
  Route::get('/perkebunan/kebunPinang/edit/{id}', 'kebunPinangController@edit');
  Route::put('/perkebunan/kebunPinang/update/{id}', 'kebunPinangController@update');
  Route::delete('/perkebunan/kebunPinang/destroy/{id}', 'kebunPinangController@destroy');
  //perkebunan/Pala
  Route::get('/perkebunan/kebunPala', 'kebunPalaController@index');
  Route::post('/perkebunan/kebunPala/store', 'kebunPalaController@store');
  Route::get('/perkebunan/kebunPala/edit/{id}', 'kebunPalaController@edit');
  Route::put('/perkebunan/kebunPala/update/{id}', 'kebunPalaController@update');
  Route::delete('/perkebunan/kebunPala/destroy/{id}', 'kebunPalaController@destroy');
  //perkebunan/Kelapasawit
  Route::get('/perkebunan/kebunKelapasawit', 'kebunKelapasawitController@index');
  Route::post('/perkebunan/kebunKelapasawit/store', 'kebunKelapasawitController@store');
  Route::get('/perkebunan/kebunKelapasawit/edit/{id}', 'kebunKelapasawitController@edit');
  Route::put('/perkebunan/kebunKelapasawit/update/{id}', 'kebunKelapasawitController@update');
  Route::delete('/perkebunan/kebunKelapasawit/destroy/{id}', 'kebunKelapasawitController@destroy');
  //perkebunan/Nilam
  Route::get('/perkebunan/kebunNilam', 'kebunNilamController@index');
  Route::post('/perkebunan/kebunNilam/store', 'kebunNilamController@store');
  Route::get('/perkebunan/kebunNilam/edit/{id}', 'kebunNilamController@edit');
  Route::put('/perkebunan/kebunNilam/update/{id}', 'kebunNilamController@update');
  Route::delete('/perkebunan/kebunNilam/destroy/{id}', 'kebunNilamController@destroy');
  //nakertrans/trasnsmigrasi
  Route::get('/nakertrans/transmigrasi', 'transmigrasiController@index');
  Route::post('/nakertrans/transmigrasi/store', 'transmigrasiController@store');
  Route::get('/nakertrans/transmigrasi/edit/{id}', 'transmigrasiController@edit');
  Route::put('/nakertrans/transmigrasi/update/{id}', 'transmigrasiController@update');
  Route::delete('/nakertrans/transmigrasi/destroy/{id}', 'transmigrasiController@destroy');
  //nakertrans/pencaker
  Route::get('/nakertrans/pencaker', 'pencakerController@index');
  Route::post('/nakertrans/pencaker/store', 'pencakerController@store');
  Route::get('/nakertrans/pencaker/edit/{id}', 'pencakerController@edit');
  Route::put('/nakertrans/pencaker/update/{id}', 'pencakerController@update');
  Route::delete('/nakertrans/pencaker/destroy/{id}', 'pencakerController@destroy');
  //nakertrans/naker
  Route::get('/nakertrans/naker', 'nakerController@index');
  Route::post('/nakertrans/naker/store', 'nakerController@store');
  Route::get('/nakertrans/naker/edit/{id}', 'nakerController@edit');
  Route::put('/nakertrans/naker/update/{id}', 'nakerController@update');
  Route::delete('/nakertrans/naker/destroy/{id}', 'nakerController@destroy');
  //perhubungan/lakalantas
  Route::get('/perhubungan/lakalantas', 'lakalantasController@index');
  Route::post('/perhubungan/lakalantas/store', 'lakalantasController@store');
  Route::get('/perhubungan/lakalantas/edit/{id}', 'lakalantasController@edit');
  Route::put('/perhubungan/lakalantas/update/{id}', 'lakalantasController@update');
  Route::delete('/perhubungan/lakalantas/destroy/{id}', 'lakalantasController@destroy');
  //perhubungan/ujikendaraan
  Route::get('/perhubungan/ujikendaraan', 'ujikendaraanController@index');
  Route::post('/perhubungan/ujikendaraan/store', 'ujikendaraanController@store');
  Route::get('/perhubungan/ujikendaraan/edit/{id}', 'ujikendaraanController@edit');
  Route::put('/perhubungan/ujikendaraan/update/{id}', 'ujikendaraanController@update');
  Route::delete('/perhubungan/ujikendaraan/destroy/{id}', 'ujikendaraanController@destroy');
  //perhubungan/fasjal
  Route::get('/perhubungan/fasjal', 'fasjalController@index');
  Route::post('/perhubungan/fasjal/store', 'fasjalController@store');
  Route::get('/perhubungan/fasjal/edit/{id}', 'fasjalController@edit');
  Route::put('/perhubungan/fasjal/update/{id}', 'fasjalController@update');
  Route::delete('/perhubungan/fasjal/destroy/{id}', 'fasjalController@destroy');
  //perpusarsip/kunjungan
  Route::get('/perpusarsip/kunjungan', 'kunjunganController@index');
  Route::get('/perpusarsip/kunjungan/detail/{kode}', 'kunjunganController@detail');
  Route::get('/perpusarsip/kunjungan/view', 'kunjunganController@view');
  Route::post('/perpusarsip/kunjungan/store', 'kunjunganController@store');
  Route::get('/perpusarsip/kunjungan/edit/{id}', 'kunjunganController@edit');
  Route::put('/perpusarsip/kunjungan/update/{id}', 'kunjunganController@update');
  Route::delete('/perpusarsip/kunjungan/destroy/{id}', 'kunjunganController@destroy');
  // Route::get('/perpusarsip/kunjungan/detailKunjungan/{id}', 'kunjunganController@detailKunjungan');
  //parawisata/hotel
  Route::get('/parawisata/hotel', 'hotelController@index');
  Route::get('/parawisata/hotel/view', 'hotelController@view');
  Route::post('/parawisata/hotel/store', 'hotelController@store');
  Route::get('/parawisata/hotel/edit/{id}', 'hotelController@edit');
  Route::put('/parawisata/hotel/update/{id}', 'hotelController@update');
  Route::delete('/parawisata/hotel/destroy/{id}', 'hotelController@destroy');
  //kominfo/internet
  Route::get('/kominfo/internet', 'internetController@index');
  Route::get('/kominfo/internet/detail/{kode}', 'internetController@detail');
  Route::post('/kominfo/internet/store', 'internetController@store');
  Route::get('/kominfo/internet/edit/{id}', 'internetController@edit');
  Route::put('/kominfo/internet/update/{id}', 'internetController@update');
  Route::delete('/kominfo/internet/destroy/{id}', 'internetController@destroy');
  //kominfo/pos
  Route::get('/kominfo/pos', 'posController@index');
  Route::post('/kominfo/pos/store', 'posController@store');
  Route::get('/kominfo/pos/edit/{id}', 'posController@edit');
  Route::put('/kominfo/pos/update/{id}', 'posController@update');
  Route::delete('/kominfo/pos/destroy/{id}', 'posController@destroy');
  //kominfo/telekomunikasi
  Route::get('/kominfo/telekomunikasi', 'telekomunikasiController@index');
  Route::post('/kominfo/telekomunikasi/store', 'telekomunikasiController@store');
  Route::get('/kominfo/telekomunikasi/edit/{id}', 'telekomunikasiController@edit');
  Route::put('/kominfo/telekomunikasi/update/{id}', 'telekomunikasiController@update');
  Route::delete('/kominfo/telekomunikasi/destroy/{id}', 'telekomunikasiController@destroy');
  //pupr/jalan
  Route::get('/pupr/jalan', 'jalanController@index');
Route::get('/pupr/jalan/view', 'jalanController@view');
  Route::post('/pupr/jalan/store', 'jalanController@store');
  Route::get('/pupr/jalan/edit/{id}', 'jalanController@edit');
  Route::put('/pupr/jalan/update/{id}', 'jalanController@update');
  Route::delete('/pupr/jalan/destroy/{id}', 'jalanController@destroy');
  //bkd/pegawai
  Route::get('/bkd/pegawai', 'pegawaiController@index');
  Route::get('/bkd/pegawai/view', 'pegawaiController@view');
  Route::post('/bkd/pegawai/store', 'pegawaiController@store');
  Route::get('/bkd/pegawai/edit/{id}', 'pegawaiController@edit');
  Route::put('/bkd/pegawai/update/{id}', 'pegawaiController@update');
  Route::delete('/bkd/pegawai/destroy/{id}', 'pegawaiController@destroy');
  //bkd/eselon
  Route::get('/bkd/eselon', 'eselonController@index');
  Route::get('/bkd/eselon/view', 'eselonController@view');
  Route::post('/bkd/eselon/store', 'eselonController@store');
  Route::get('/bkd/eselon/edit/{id}', 'eselonController@edit');
  Route::put('/bkd/eselon/update/{id}', 'eselonController@update');
  Route::delete('/bkd/eselon/destroy/{id}', 'eselonController@destroy');
  //bkd/golongan
  Route::get('/bkd/golongan', 'golonganController@index');
  Route::get('/bkd/golongan/view', 'golonganController@view');
  Route::post('/bkd/golongan/store', 'golonganController@store');
  Route::get('/bkd/golongan/edit/{id}', 'golonganController@edit');
  Route::put('/bkd/golongan/update/{id}', 'golonganController@update');
  Route::delete('/bkd/golongan/destroy/{id}', 'golonganController@destroy');
  //sosial/bencana
  Route::get('/sosial/bencana', 'bencanaController@index');
  Route::post('/sosial/bencana/store', 'bencanaController@store');
  Route::get('/sosial/bencana/edit/{id}', 'bencanaController@edit');
  Route::put('/sosial/bencana/update/{id}', 'bencanaController@update');
  Route::delete('/sosial/bencana/destroy/{id}', 'bencanaController@destroy');
  //sosial/masalahsosial
  Route::get('/sosial/masalahsosial', 'masalahsosialController@index');
  Route::get('/sosial/masalahsosial/detail/{kode}', 'masalahsosialController@detail');
  Route::post('/sosial/masalahsosial/store', 'masalahsosialController@store');
  Route::get('/sosial/masalahsosial/edit/{id}', 'masalahsosialController@edit');
  Route::put('/sosial/masalahsosial/update/{id}', 'masalahsosialController@update');
  Route::delete('/sosial/masalahsosial/destroy/{id}', 'masalahsosialController@destroy');
  //bpbd/bencanaalam+view
  Route::get('/bpbd/bencanaalam', 'bencanaalamController@index');
  Route::get('/bpbd/bencanaalam', 'bencanaalamController@index');
  Route::get('/bpbd/bencanaalam/view', 'bencanaalamController@view');
  Route::get('/bpbd/bencanaalam/detail', 'bencanaalamController@detail');
  Route::post('/bpbd/bencanaalam/store', 'bencanaalamController@store');
  Route::get('/bpbd/bencanaalam/edit/{id}', 'bencanaalamController@edit');
  Route::get('/bpbd/bencanaalam/detail/{id}', 'bencanaalamController@detail');
  Route::put('/bpbd/bencanaalam/update/{id}', 'bencanaalamController@update');
  Route::delete('/bpbd/bencanaalam/destroy/{id}', 'bencanaalamController@destroy');
  //satpolpp/pelanggaranK3+view
  Route::get('/satpolpp/pelanggaranK3', 'pelanggaranK3Controller@index');
  Route::get('/satpolpp/pelanggaranK3/view', 'pelanggaranK3Controller@view');
  Route::post('/satpolpp/pelanggaranK3/store', 'pelanggaranK3Controller@store');
  Route::get('/satpolpp/pelanggaranK3/edit/{id}', 'pelanggaranK3Controller@edit');
  Route::put('/satpolpp/pelanggaranK3/update/{id}', 'pelanggaranK3Controller@update');
  Route::delete('/satpolpp/pelanggaranK3/destroy/{id}', 'pelanggaranK3Controller@destroy');
  //satpolpp/pertikaian+view
  Route::get('/satpolpp/pertikaian', 'pertikaianController@index');
  Route::get('/satpolpp/pertikaian/view', 'pertikaianController@view');
  Route::post('/satpolpp/pertikaian/store', 'pertikaianController@store');
  Route::get('/satpolpp/pertikaian/edit/{id}', 'pertikaianController@edit');
  Route::put('/satpolpp/pertikaian/update/{id}', 'pertikaianController@update');
  Route::delete('/satpolpp/pertikaian/destroy/{id}', 'pertikaianController@destroy');
  //satpolpp/korbanpertikaian+view
  Route::get('/satpolpp/korbanpertikaian', 'korbanpertikaianController@index');
  Route::get('/satpolpp/korbanpertikaian/view', 'korbanpertikaianController@view');
  Route::post('/satpolpp/korbanpertikaian/store', 'korbanpertikaianController@store');
  Route::get('/satpolpp/korbanpertikaian/edit/{id}', 'korbanpertikaianController@edit');
  Route::put('/satpolpp/korbanpertikaian/update/{id}', 'korbanpertikaianController@update');
  Route::delete('/satpolpp/korbanpertikaian/destroy/{id}', 'korbanpertikaianController@destroy');
  //satpolpp/unjukrasa+view
  Route::get('/satpolpp/unjukrasa', 'unjukrasaController@index');
  Route::get('/satpolpp/unjukrasa/view', 'unjukrasaController@view');
  Route::post('/satpolpp/unjukrasa/store', 'unjukrasaController@store');
  Route::get('/satpolpp/unjukrasa/edit/{id}', 'unjukrasaController@edit');
  Route::put('/satpolpp/unjukrasa/update/{id}', 'unjukrasaController@update');
  Route::delete('/satpolpp/unjukrasa/destroy/{id}', 'unjukrasaController@destroy');
  //satpolpp/korbanunjukrasa+view
  Route::get('/satpolpp/korbanunjukrasa', 'korbanunjukrasaController@index');
  Route::get('/satpolpp/korbanunjukrasa/view', 'korbanunjukrasaController@view');
  Route::post('/satpolpp/korbanunjukrasa/store', 'korbanunjukrasaController@store');
  Route::get('/satpolpp/korbanunjukrasa/edit/{id}', 'korbanunjukrasaController@edit');
  Route::put('/satpolpp/korbanunjukrasa/update/{id}', 'korbanunjukrasaController@update');
  Route::delete('/satpolpp/korbanunjukrasa/destroy/{id}', 'korbanunjukrasaController@destroy');
  //satpolpp/aparatkeamanan+view
  Route::get('/satpolpp/aparatkeamanan', 'aparatkeamananController@index');
  Route::get('/satpolpp/aparatkeamanan/view', 'aparatkeamananController@view');
  Route::post('/satpolpp/aparatkeamanan/store', 'aparatkeamananController@store');
  Route::get('/satpolpp/aparatkeamanan/edit/{id}', 'aparatkeamananController@edit');
  Route::put('/satpolpp/aparatkeamanan/update/{id}', 'aparatkeamananController@update');
  Route::delete('/satpolpp/aparatkeamanan/destroy/{id}', 'aparatkeamananController@destroy');
  //satpolpp/saranakeamanan+view
  Route::get('/satpolpp/saranakeamanan', 'saranakeamananController@index');
  Route::get('/satpolpp/saranakeamanan/view', 'saranakeamananController@view');
  Route::post('/satpolpp/saranakeamanan/store', 'saranakeamananController@store');
  Route::get('/satpolpp/saranakeamanan/edit/{id}', 'saranakeamananController@edit');
  Route::put('/satpolpp/saranakeamanan/update/{id}', 'saranakeamananController@update');
  Route::delete('/satpolpp/saranakeamanan/destroy/{id}', 'saranakeamananController@destroy');
  //satpolpp/kendaraanoperasional+view
  Route::get('/satpolpp/kendaraanoperasional', 'kendaraanoperasionalController@index');
  Route::get('/satpolpp/kendaraanoperasional/view', 'kendaraanoperasionalController@view');
  Route::post('/satpolpp/kendaraanoperasional/store', 'kendaraanoperasionalController@store');
  Route::get('/satpolpp/kendaraanoperasional/edit/{id}', 'kendaraanoperasionalController@edit');
  Route::put('/satpolpp/kendaraanoperasional/update/{id}', 'kendaraanoperasionalController@update');
  Route::delete('/satpolpp/kendaraanoperasional/destroy/{id}', 'kendaraanoperasionalController@destroy');
  //bkud/apbd+view
  Route::get('/bkud/apbd', 'apbdController@index');
  Route::get('/bkud/apbd/view', 'apbdController@view');
  Route::post('/bkud/apbd/store', 'apbdController@store');
  Route::get('/bkud/apbd/edit/{id}', 'apbdController@edit');
  Route::put('/bkud/apbd/update/{id}', 'apbdController@update');
  Route::delete('/bkud/apbd/destroy/{id}', 'apbdController@destroy');
  //koperasi/koperasi+view
  Route::get('/koperasi/koperasi', 'koperasiController@index');
  Route::get('/koperasi/koperasi/detail/{kode}', 'koperasfiController@detail');
  Route::get('/koperasi/koperasi/view', 'koperasiController@view');
  Route::post('/koperasi/koperasi/store', 'koperasiController@store');
  Route::get('/koperasi/koperasi/edit/{id}', 'koperasiController@edit');
  Route::put('/koperasi/koperasi/update/{id}', 'koperasiController@update');
  Route::delete('/koperasi/koperasi/destroy/{id}', 'koperasiController@destroy');
  //bkd/pegawaipendidikan+view
  Route::get('/bkd/pegawaipendidikan', 'pegawaipendidikanController@index');
  Route::get('/bkd/pegawaipendidikan/view', 'pegawaipendidikanController@view');
  Route::post('/bkd/pegawaipendidikan/store', 'pegawaipendidikanController@store');
  Route::get('/bkd/pegawaipendidikan/edit/{id}', 'pegawaipendidikanController@edit');
  Route::put('/bkd/pegawaipendidikan/update/{id}', 'pegawaipendidikanController@update');
  Route::delete('/bkd/pegawaipendidikan/destroy/{id}', 'pegawaipendidikanController@destroy');
  //bkd/pegawaiagama+view
  Route::get('/bkd/pegawaiagama', 'pegawaiagamaController@index');
  Route::get('/bkd/pegawaiagama/view', 'pegawaiagamaController@view');
  Route::post('/bkd/pegawaiagama/store', 'pegawaiagamaController@store');
  Route::get('/bkd/pegawaiagama/edit/{id}', 'pegawaiagamaController@edit');
  Route::put('/bkd/pegawaiagama/update/{id}', 'pegawaiagamaController@update');
  Route::delete('/bkd/pegawaiagama/destroy/{id}', 'pegawaiagamaController@destroy');
  //lingkungan/sppl+view
  Route::get('/lingkungan/sppl', 'spplController@index');
  Route::get('/lingkungan/sppl/detail/{kode}', 'spplController@detail');
  Route::get('/lingkungan/sppl/view', 'spplController@view');
  Route::post('/lingkungan/sppl/store', 'spplController@store');
  Route::get('/lingkungan/sppl/edit/{id}', 'spplController@edit');
  Route::put('/lingkungan/sppl/update/{id}', 'spplController@update');
  Route::delete('/lingkungan/sppl/destroy/{id}', 'spplController@destroy');
  //pemodal/penerbitanizin+view
  Route::get('/pemodal/penerbitanizin', 'penerbitanizinController@index');
  Route::get('/pemodal/penerbitanizin/view', 'penerbitanizinController@view');
  Route::get('/pemodal/penerbitanizin/detail/{kode}', 'penerbitanizinController@detail');
  Route::post('/pemodal/penerbitanizin/store', 'penerbitanizinController@store');
  Route::get('/pemodal/penerbitanizin/edit/{id}', 'penerbitanizinController@edit');
  Route::put('/pemodal/penerbitanizin/update/{id}', 'penerbitanizinController@update');
  Route::delete('/pemodal/penerbitanizin/destroy/{id}', 'penerbitanizinController@destroy');
  //kesbangpol/lsm+view
  Route::get('/kesbangpol/lsm', 'lsmController@index');
  Route::get('/kesbangpol/lsm/view', 'lsmController@view');
  Route::post('/kesbangpol/lsm/store', 'lsmController@store');
  Route::get('/kesbangpol/lsm/edit/{id}', 'lsmController@edit');
  Route::put('/kesbangpol/lsm/update/{id}', 'lsmController@update');
  Route::delete('/kesbangpol/lsm/destroy/{id}', 'lsmController@destroy');
  //pupr/lsm+view
  Route::get('/pupr/airlimbah', 'airlimbahController@index');
  Route::get('/pupr/airlimbah/detail/{kode}', 'airlimbahController@detail');
  Route::get('/pupr/airlimbah/view', 'airlimbahController@view');
  Route::post('/pupr/airlimbah/store', 'airlimbahController@store');
  Route::get('/pupr/airlimbah/edit/{id}', 'airlimbahController@edit');
  Route::put('/pupr/airlimbah/update/{id}', 'airlimbahController@update');
  Route::delete('/pupr/airlimbah/destroy/{id}', 'airlimbahController@destroy');
  //pupr/bangunan+view
  Route::get('/pupr/bangunan', 'bangunanController@index');
  Route::get('/pupr/bangunan/view', 'bangunanController@view');
  Route::get('/pupr/bangunan/detail/{kode}', 'bangunanController@detail');
  Route::post('/pupr/bangunan/store', 'bangunanController@store');
  Route::get('/pupr/bangunan/edit/{id}', 'bangunanController@edit');
  Route::put('/pupr/bangunan/update/{id}', 'bangunanController@update');
  Route::delete('/pupr/bangunan/destroy/{id}', 'bangunanController@destroy');
  //pupr/drainase+view
  Route::get('/pupr/drainase', 'drainaseController@index');
   Route::get('/pupr/drainase/detail/{kode}', 'drainaseController@detail');
  Route::get('/pupr/drainase/view', 'drainaseController@view');
  Route::post('/pupr/drainase/store', 'drainaseController@store');
  Route::get('/pupr/drainase/edit/{id}', 'drainaseController@edit');
  Route::put('/pupr/drainase/update/{id}', 'drainaseController@update');
  Route::delete('/pupr/drainase/destroy/{id}', 'drainaseController@destroy');
  //pupr/pemukiman+view
  Route::get('/pupr/pemukiman', 'pemukimanController@index');
  Route::get('/pupr/pemukiman/detail/{kode}', 'pemukimanController@detail');
  Route::get('/pupr/pemukiman/view', 'pemukimanController@view');
  Route::post('/pupr/pemukiman/store', 'pemukimanController@store');
  Route::get('/pupr/pemukiman/edit/{id}', 'pemukimanController@edit');
  Route::put('/pupr/pemukiman/update/{id}', 'pemukimanController@update');
  Route::delete('/pupr/pemukiman/destroy/{id}', 'pemukimanController@destroy');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
