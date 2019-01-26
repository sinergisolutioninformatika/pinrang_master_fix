<?php

use Illuminate\Database\Seeder;

class daftar_walidata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('walidata')->insert([
        'id' => 1,
        'skpd_id' => 2,
        'nmaData' => 'Kondisi Bangunan SD dan Sederajat',
        'kategori_id' => 1,
        'keterangan' => 'Kondisi Bangunan SD dan Sederajat',
        'link_view' => '/pendidikan/kondisiSD/view',
        'link_admin' => '/pendidikan/kondisiSD',
        'tag' => 'Kondisi Bangunan SD dan Sederajat'
      ]);
      DB::table('walidata')->insert([
        'id' => 2,
        'skpd_id' => 2,
        'nmaData' => 'Kondisi Bangunan SMP Sederajat',
        'kategori_id' => 1,
        'keterangan' => 'Kondisi Bangunan SMP Sederajat',
        'link_view' => '/pendidikan/kondisiSMP/view',
        'link_admin' => '/pendidikan/kondisiSMP',
        'tag' => 'Kondisi Bangunan SMP Sederajat'
      ]);
      DB::table('walidata')->insert([
        'id' => 3,
        'skpd_id' => 2,
        'nmaData' => 'Kondisi Bangunan TK Sederajat',
        'kategori_id' => 1,
        'keterangan' => 'Kondisi Bangunan TK Sederajat',
        'link_view' => '/pendidikan/kondisiTK/view',
        'link_admin' => '/pendidikan/kondisiTK',
        'tag' => 'Kondisi Bangunan TK Sederajat'
      ]);
      DB::table('walidata')->insert([
        'id' => 4,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Siswa Taman Kanak-kanak',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Siswa Taman Kanak-kanak',
        'link_view' => '/pendidikan/siswaTK/view',
        'link_admin' => '/pendidikan/siswaTK',
        'tag' => 'Jumlah Siswa Taman Kanak-kanak'
      ]);
      DB::table('walidata')->insert([
        'id' => 5,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Siswa Sekolah Dasar dan Sederajat',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Siswa Sekolah Dasar dan Sederajat',
        'link_view' => '/pendidikan/siswaSD/view',
        'link_admin' => '/pendidikan/siswaSD',
        'tag' => 'Jumlah Siswa Sekolah Dasar dan Sederajat'
      ]);
      DB::table('walidata')->insert([
        'id' => 6,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat',
        'link_view' => '/pendidikan/siswaSMP/view',
        'link_admin' => '/pendidikan/siswaSMP',
        'tag' => 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat'
      ]);
      DB::table('walidata')->insert([
        'id' => 7,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)',
        'link_view' => '/pendidikan/guruPNS/view',
        'link_admin' => '/pendidikan/guruPNS',
        'tag' => 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)'
      ]);
      DB::table('walidata')->insert([
        'id' => 8,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Guru Berstatus Honorer',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Guru Berstatus Honorer',
        'link_view' => '/pendidikan/guruHonor/view',
        'link_admin' => '/pendidikan/guruHonor',
        'tag' => 'Jumlah Guru Berstatus Honorer'
      ]);
      DB::table('walidata')->insert([
        'id' => 9,
        'skpd_id' => 2,
        'nmaData' => 'Jumlah Guru Bersertifikasi',
        'kategori_id' => 3,
        'keterangan' => 'Jumlah Guru Bersertifikasi',
        'link_view' => '/pendidikan/guruSertifikat/view',
        'link_admin' => '/pendidikan/guruSertifikat',
        'tag' => 'Jumlah Guru Bersertifikasi'
      ]);
      DB::table('walidata')->insert([
        'id' => 10,
        'skpd_id' => 8,
        'nmaData' => 'Data Jumlah Penduduk (berdasarkan jenis kelamin)',
        'kategori_id' => 3,
        'keterangan' => 'Data Jumlah Penduduk (berdasarkan jenis kelamin)',
        'link_view' => '/kependudukan/penduduk/view',
        'link_admin' => '/kependudukan/penduduk',
        'tag' => 'Data Jumlah Penduduk (berdasarkan jenis kelamin)'
      ]);
      DB::table('walidata')->insert([
        'id' => 11,
        'skpd_id' => 8,
        'nmaData' => 'Data Kependudukan (Kartu Keluarga)',
        'kategori_id' => 3,
        'keterangan' => 'Data Kependudukan (Kartu Keluarga)',
        'link_view' => '/kependudukan/kartukeluarga/view',
        'link_admin' => '/kependudukan/kartukeluarga',
        'tag' => 'Data Kependudukan (Kartu Keluarga)'
      ]);
      DB::table('walidata')->insert([
        'id' => 12,
        'skpd_id' => 8,
        'nmaData' => 'Data Kependudukan (Kelahiran/Kematian)',
        'kategori_id' => 3,
        'keterangan' => 'Data Kependudukan (Kelahiran/Kematian)',
        'link_view' => '/kependudukan/kelahiran/view',
        'link_admin' => '/kependudukan/kelahiran',
        'tag' => 'Data Kependudukan (Kelahiran/Kematian)'
      ]);
      DB::table('walidata')->insert([
        'id' => 13,
        'skpd_id' => 8,
        'nmaData' => 'Data Kependudukan (Perkawinan/Perceraian)',
        'kategori_id' => 3,
        'keterangan' => 'Data Kependudukan (Perkawinan/Perceraian)',
        'link_view' => '/kependudukan/kawin/view',
        'link_admin' => '/kependudukan/kawin',
        'tag' => 'Data Kependudukan (Perkawinan/Perceraian)'
      ]);
      DB::table('walidata')->insert([
        'id' => 14,
        'skpd_id' => 1,
        'nmaData' => 'Data 10 Penyakit Terbesar Faskes TK.I',
        'kategori_id' => 3,
        'keterangan' => 'Data 10 Penyakit Terbesar Faskes TK.I',
        'link_view' => '/kesehatan/penyakit10/view',
        'link_admin' => '/kesehatan/penyakit10',
        'tag' => 'Data 10 Penyakit Terbesar Faskes TK.I'
      ]);
      DB::table('walidata')->insert([
        'id' => 15,
        'skpd_id' => 1,
        'nmaData' => 'Data Jaminan Kesehatan Penduduk',
        'kategori_id' => 3,
        'keterangan' => 'Data Jaminan Kesehatan Penduduk',
        'link_view' => '/kesehatan/jamkes/view',
        'link_admin' => '/kesehatan/jamkes',
        'tag' => 'Data Jaminan Kesehatan Penduduk'
      ]);
      DB::table('walidata')->insert([
        'id' => 16,
        'skpd_id' => 1,
        'nmaData' => 'Data Kasus Gizi Buruk Mendapat Perawatan',
        'kategori_id' => 3,
        'keterangan' => 'Data Kasus Gizi Buruk Mendapat Perawatan',
        'link_view' => '/kesehatan/giziburuk/view',
        'link_admin' => '/kesehatan/giziburuk',
        'tag' => 'Data Kasus Gizi Buruk Mendapat Perawatan'
      ]);
      DB::table('walidata')->insert([
        'id' => 17,
        'skpd_id' => 17,
        'nmaData' => 'Data Luas Area Persawahan',
        'kategori_id' => 2,
        'keterangan' => 'Data Luas Area Persawahan',
        'link_view' => '/psda/luassawah/view',
        'link_admin' => '/psda/luassawah',
        'tag' => 'Data Luas Area Persawahan'
      ]);
      DB::table('walidata')->insert([
        'id' => 18,
        'skpd_id' => 17,
        'nmaData' => 'Data Panjang Saluran Irigasi',
        'kategori_id' => 1,
        'keterangan' => 'Data Panjang Saluran Irigasi',
        'link_view' => '/psda/irigasi/view',
        'link_admin' => '/psda/irigasi',
        'tag' => 'Data Panjang Saluran Irigasi'
      ]);
      DB::table('walidata')->insert([
        'id' => 19,
        'skpd_id' => 18,
        'nmaData' => 'Data Pencapaian Peserta KB Aktif (CU)',
        'kategori_id' => 3,
        'keterangan' => 'Data Pencapaian Peserta KB Aktif (CU)',
        'link_view' => '/ppkb/kbaktif/view',
        'link_admin' => '/ppkb/kbaktif',
        'tag' => 'Data Pencapaian Peserta KB Aktif (CU)'
      ]);
      DB::table('walidata')->insert([
        'id' => 20,
        'skpd_id' => 11,
        'nmaData' => 'Data Jumlah Usaha Kecil Mikro dan Menengah',
        'kategori_id' => 2,
        'keterangan' => 'Data Jumlah Usaha Kecil Mikro dan Menengah',
        'link_view' => '/koperasi/umkm/view',
        'link_admin' => '/koperasi/umkm',
        'tag' => 'Data Jumlah Usaha Kecil Mikro dan Menengah'
      ]);
      DB::table('walidata')->insert([
        'id' => 21,
        'skpd_id' => 23,
        'nmaData' => 'Data Luas Area Persawahan',
        'kategori_id' => 2,
        'keterangan' => 'Data Luas Area Persawahan',
        'link_view' => '/pertanian/sawah/view',
        'link_admin' => '/pertanian/sawah',
        'tag' => 'Data Luas Area Persawahan'
      ]);
      DB::table('walidata')->insert([
        'id' => 22,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan',
        'link_view' => '/pertanian/padi/view',
        'link_admin' => '/pertanian/padi',
        'tag' => 'Data Komoditi Tanaman Pangan'
      ]);
      DB::table('walidata')->insert([
        'id' => 23,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Jagung)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Jagung)',
        'link_view' => '/pertanian/jagung/view',
        'link_admin' => '/pertanian/jagung',
        'tag' => 'Data Komoditi Tanaman Pangan (Jagung)'
      ]);
      DB::table('walidata')->insert([
        'id' => 24,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Kedelai)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Kedelai)',
        'link_view' => '/pertanian/kedelai/view',
        'link_admin' => '/pertanian/kedelai',
        'tag' => 'Data Komoditi Tanaman Pangan (Kedelai)'
      ]);
      DB::table('walidata')->insert([
        'id' => 25,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Kacang tanah)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Kacang tanah)',
        'link_view' => 'pertanian/kacangtanah/view',
        'link_admin' => 'pertanian/kacangtanah',
        'tag' => 'Data Komoditi Tanaman Pangan (Kacang tanah)'
      ]);
      DB::table('walidata')->insert([
        'id' => 26,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Kacang hijau)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Kacang hijau)',
        'link_view' => '/pertanian/kacanghijau/view',
        'link_admin' => '/pertanian/kacanghijau',
        'tag' => 'Data Komoditi Tanaman Pangan (Kacang hijau)'
      ]);
      DB::table('walidata')->insert([
        'id' => 27,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Ubi kayu)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Ubi kayu)',
        'link_view' => '/pertanian/ubikayu/view',
        'link_admin' => '/pertanian/ubikayu',
        'tag' => 'Data Komoditi Tanaman Pangan (Ubi kayu)'
      ]);
      DB::table('walidata')->insert([
        'id' => 28,
        'skpd_id' => 23,
        'nmaData' => 'Data Komoditi Tanaman Pangan (Ubi jalar)',
        'kategori_id' => 2,
        'keterangan' => 'Data Komoditi Tanaman Pangan (Ubi jalar)',
        'link_view' => '/pertanian/ubijalar/view',
        'link_admin' => '/pertanian/ubijalar',
        'tag' => 'Data Komoditi Tanaman Pangan (Ubi jalar)'
      ]);
      DB::table('walidata')->insert([
        'id' => 29,
        'skpd_id' => 20,
        'nmaData' => 'Data Jumlah Nelayan dan Petani Ikan',
        'kategori_id' => 2,
        'keterangan' => 'Data Jumlah Nelayan dan Petani Ikan',
        'link_view' => '/perikanan/nelayan/view',
        'link_admin' => '/perikanan/nelayan',
        'tag' => 'Data Jumlah Nelayan dan Petani Ikan'
      ]);
      DB::table('walidata')->insert([
        'id' => 30,
        'skpd_id' => 20,
        'nmaData' => 'Data Jumlah Armada Penangkapan Ikan',
        'kategori_id' => 2,
        'keterangan' => 'Data Jumlah Armada Penangkapan Ikan',
        'link_view' => '/perikanan/armada/view',
        'link_admin' => '/perikanan/armada',
        'tag' => 'Data Jumlah Armada Penangkapan Ikan'
      ]);
      DB::table('walidata')->insert([
        'id' => 31,
        'skpd_id' => 20,
        'nmaData' => 'Data Luas Usaha Budidaya Ikan',
        'kategori_id' => 2,
        'keterangan' => 'Data Luas Usaha Budidaya Ikan',
        'link_view' => '/perikanan/budidaya/view',
        'link_admin' => '/perikanan/budidaya',
        'tag' => 'Data Luas Usaha Budidaya Ikan'
      ]);
      DB::table('walidata')->insert([
        'id' => 32,
        'skpd_id' => 20,
        'nmaData' => 'Data Produksi Perikanan',
        'kategori_id' => 2,
        'keterangan' => 'Data Produksi Perikanan',
        'link_view' => '/perikanan/produksiikan/view',
        'link_admin' => '/perikanan/produksiikan',
        'tag' => 'Data Produksi Perikanan'
      ]);
      DB::table('walidata')->insert([
        'id' => 33,
        'skpd_id' => 20,
        'nmaData' => 'Data Produksi Ikan Asin/Olahan',
        'kategori_id' => 2,
        'keterangan' => 'Data Produksi Ikan Asin/Olahan',
        'link_view' => '/perikanan/ikanasin/view',
        'link_admin' => '/perikanan/ikanasin',
        'tag' => 'Data Produksi Ikan Asin/Olahan'
      ]);
      DB::table('walidata')->insert([
        'id' => 34,
        'skpd_id' => 20,
        'nmaData' => 'Data Produksi Ikan Segar',
        'kategori_id' => 2,
        'keterangan' => 'Data Produksi Ikan Segar',
        'link_view' => '/perikanan/ikansegar/view',
        'link_admin' => '/perikanan/ikansegar',
        'tag' => 'Data Produksi Ikan Segar'
      ]);
      DB::table('walidata')->insert([
        'id' => 35,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Kerbau)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Kerbau)',
        'link_view' => '/peternakan/ternakKerbau/view',
        'link_admin' => '/peternakan/ternakKerbau',
        'tag' => 'Data Populasi Ternak (Kerbau)'
      ]);
      DB::table('walidata')->insert([
        'id' => 36,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Kuda)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Kuda)',
        'link_view' => '/peternakan/ternakKuda/view',
        'link_admin' => '/peternakan/ternakKuda',
        'tag' => 'Data Populasi Ternak (Kuda)'
      ]);
      DB::table('walidata')->insert([
        'id' => 37,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Sapi Potong)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Sapi Potong)',
        'link_view' => '/peternakan/ternakSapipotong/view',
        'link_admin' => '/peternakan/ternakSapipotong',
        'tag' => 'Data Populasi Ternak (Sapi Potong)'
      ]);
      DB::table('walidata')->insert([
        'id' => 38,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Sapi Perah)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Sapi Perah)',
        'link_view' => '/peternakan/ternakSapiperah/view',
        'link_admin' => '/peternakan/ternakSapiperah',
        'tag' => 'Data Populasi Ternak (Sapi Perah)'
      ]);
      DB::table('walidata')->insert([
        'id' => 39,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Babi)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Babi)',
        'link_view' => '/peternakan/ternakBabi/view',
        'link_admin' => '/peternakan/ternakBabi',
        'tag' => 'Data Populasi Ternak (Babi)'
      ]);
      DB::table('walidata')->insert([
        'id' => 40,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Domba)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Domba)',
        'link_view' => '/peternakan/ternakDomba/view',
        'link_admin' => '/peternakan/ternakDomba',
        'tag' => 'Data Populasi Ternak (Domba)'
      ]);
      DB::table('walidata')->insert([
        'id' => 41,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Kambing)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Kambing)',
        'link_view' => '/peternakan/ternakKambing/view',
        'link_admin' => '/peternakan/ternakKambing',
        'tag' => 'Data Populasi Ternak (Kambing)'
      ]);
      DB::table('walidata')->insert([
        'id' => 42,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Ayam Buras)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Ayam Buras)',
        'link_view' => '/peternakan/ternakAyamburas/view',
        'link_admin' => '/peternakan/ternakAyamburas',
        'tag' => 'Data Populasi Ternak (Ayam Buras)'
      ]);
      DB::table('walidata')->insert([
        'id' => 43,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Ayam Ras Pedaging)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Ayam Ras Pedaging)',
        'link_view' => '/peternakan/ternakAyamraspedaging/view',
        'link_admin' => '/peternakan/ternakAyamraspedaging',
        'tag' => 'Data Populasi Ternak (Ayam Ras Pedaging)'
      ]);
      DB::table('walidata')->insert([
        'id' => 44,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Ayam Ras Petelur)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Ayam Ras Petelur)',
        'link_view' => '/peternakan/ternakAyamraspetelur/view',
        'link_admin' => '/peternakan/ternakAyamraspetelur',
        'tag' => 'Data Populasi Ternak (Ayam Ras Petelur)'
      ]);
      DB::table('walidata')->insert([
        'id' => 45,
        'skpd_id' => 24,
        'nmaData' => 'Data Populasi Ternak (Itik)',
        'kategori_id' => 2,
        'keterangan' => 'Data Populasi Ternak (Itik)',
        'link_view' => '/peternakan/ternakItik/view',
        'link_admin' => '/peternakan/ternakItik',
        'tag' => 'Data Populasi Ternak (Itik)'
      ]);
      DB::table('walidata')->insert([
        'id' => 46,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)',
        'link_view' => '/perkebunan/kebunKelapadalam/view',
        'link_admin' => '/perkebunan/kebunKelapadalam',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)'
      ]);
      DB::table('walidata')->insert([
        'id' => 47,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)',
        'link_view' => '/perkebunan/kebunKelapahybrida/view',
        'link_admin' => '/perkebunan/kebunKelapahybrida',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)'
      ]);
      DB::table('walidata')->insert([
        'id' => 48,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kakao)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kakao)',
        'link_view' => '/perkebunan/kebunKakao/view',
        'link_admin' => '/perkebunan/kebunKakao',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kakao)'
      ]);
      DB::table('walidata')->insert([
        'id' => 49,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)',
        'link_view' => '/perkebunan/kebunKopirobusta/view',
        'link_admin' => '/perkebunan/kebunKopirobusta',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)'
      ]);
      DB::table('walidata')->insert([
        'id' => 50,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)',
        'link_view' => '/perkebunan/kebunKopiarabika/view',
        'link_admin' => '/perkebunan/kebunKopiarabika',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)'
      ]);
      DB::table('walidata')->insert([
        'id' => 51,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Jambu Mete)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Jambu Mete)',
        'link_view' => '/perkebunan/kebunJambumete/view',
        'link_admin' => '/perkebunan/kebunJambumete',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Jambu Mete)'
      ]);
      DB::table('walidata')->insert([
        'id' => 52,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Cengkeh)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Cengkeh)',
        'link_view' => '/perkebunan/kebunCengkeh/view',
        'link_admin' => '/perkebunan/kebunCengkeh',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Cengkeh)'
      ]);
      DB::table('walidata')->insert([
        'id' => 53,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Lada)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Lada)',
        'link_view' => '/perkebunan/kebunLada/view',
        'link_admin' => '/perkebunan/kebunLada',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Lada)'
      ]);
      DB::table('walidata')->insert([
        'id' => 54,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kapuk)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kapuk)',
        'link_view' => '/perkebunan/kebunKapuk/view',
        'link_admin' => '/perkebunan/kebunKapuk',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kapuk)'
      ]);
      DB::table('walidata')->insert([
        'id' => 55,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Panili)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Panili)',
        'link_view' => '/perkebunan/kebunPanili/view',
        'link_admin' => '/perkebunan/kebunPanili',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Panili)'
      ]);
      DB::table('walidata')->insert([
        'id' => 56,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Aren)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Aren)',
        'link_view' => '/perkebunan/kebunAren/view',
        'link_admin' => '/perkebunan/kebunAren',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Aren)'
      ]);
      DB::table('walidata')->insert([
        'id' => 57,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Pinang)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Pinang)',
        'link_view' => '/perkebunan/kebunPinang/view',
        'link_admin' => '/perkebunan/kebunPinang',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Pinang)'
      ]);
      DB::table('walidata')->insert([
        'id' => 58,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Pala)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Pala)',
        'link_view' => '/perkebunan/kebunPala/view',
        'link_admin' => '/perkebunan/kebunPala',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Pala)'
      ]);
      DB::table('walidata')->insert([
        'id' => 59,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)',
        'link_view' => '/perkebunan/kebunKelapasawit/view',
        'link_admin' => '/perkebunan/kebunKelapasawit',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)'
      ]);
      DB::table('walidata')->insert([
        'id' => 60,
        'skpd_id' => 24,
        'nmaData' => 'Data Produktivitas dan Areal Pertanian (Nilam)',
        'kategori_id' => 2,
        'keterangan' => 'Data Produktivitas dan Areal Pertanian (Nilam)',
        'link_view' => '/perkebunan/kebunNilam/view',
        'link_admin' => '/perkebunan/kebunNilam',
        'tag' => 'Data Produktivitas dan Areal Pertanian (Nilam)'
      ]);
      DB::table('walidata')->insert([
        'id' => 61,
        'skpd_id' => 26,
        'nmaData' => 'Data Transmigrasi',
        'kategori_id' => 3,
        'keterangan' => 'Data Transmigrasi',
        'link_view' => '/nakertrans/transmigrasi/view',
        'link_admin' => '/nakertrans/transmigrasi',
        'tag' => 'Data Transmigrasi'
      ]);
      DB::table('walidata')->insert([
        'id' => 62,
        'skpd_id' => 26,
        'nmaData' => 'Data Pencari Kerja',
        'kategori_id' => 3,
        'keterangan' => 'Data Pencari Kerja',
        'link_view' => '/nakertrans/pencaker/view',
        'link_admin' => '/nakertrans/pencaker',
        'tag' => 'Data Pencari Kerja'
      ]);
      DB::table('walidata')->insert([
        'id' => 63,
        'skpd_id' => 26,
        'nmaData' => 'Data Jumlah PerPerusahaanan dan Tenaga Kerja',
        'kategori_id' => 3,
        'keterangan' => 'Data Jumlah PerPerusahaanan dan Tenaga Kerja',
        'link_view' => '/nakertrans/naker/view',
        'link_admin' => '/nakertrans/naker',
        'tag' => 'Data Jumlah PerPerusahaanan dan Tenaga Kerja'
      ]);
      DB::table('walidata')->insert([
        'id' => 64,
        'skpd_id' => 19,
        'nmaData' => 'Data Jumlah Kecelakaan Lalu Lintas',
        'kategori_id' => 3,
        'keterangan' => 'Data Jumlah Kecelakaan Lalu Lintas',
        'link_view' => '/perhubungan/lakalantas/view',
        'link_admin' => '/perhubungan/lakalantas',
        'tag' => 'Data Jumlah Kecelakaan Lalu Lintas'
      ]);
      DB::table('walidata')->insert([
        'id' => 65,
        'skpd_id' => 19,
        'nmaData' => 'Data Jumlah Kendaraan Uji',
        'kategori_id' => 1,
        'keterangan' => 'Data Jumlah Kendaraan Uji',
        'link_view' => '/perhubungan/ujikendaraan/view',
        'link_admin' => '/perhubungan/ujikendaraan',
        'tag' => 'Data Jumlah Kendaraan Uji'
      ]);
      DB::table('walidata')->insert([
        'id' => 66,
        'skpd_id' => 19,
        'nmaData' => 'Data Fasilitas Perlengkapan Jalan',
        'kategori_id' => 2,
        'keterangan' => 'Data Fasilitas Perlengkapan Jalan',
        'link_view' => '/perhubungan/fasjal/view',
        'link_admin' => '/perhubungan/fasjal',
        'tag' => 'Data Fasilitas Perlengkapan Jalan'
      ]);
      DB::table('walidata')->insert([
        'id' => 67,
        'skpd_id' => 22,
        'nmaData' => 'Data Kunjungan Perpustakaan',
        'kategori_id' => 3,
        'keterangan' => 'Data Kunjungan Perpustakaan',
        'link_view' => '/perpusarsip/kunjungan/view',
        'link_admin' => '/perpusarsip/kunjungan',
        'tag' => 'Data Kunjungan Perpustakaan'
      ]);
    }
}
