<?php

use Illuminate\Database\Seeder;

class daftar_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'id' => 1,
            'name' => 'Dinas Kesehatan',
            'skpd_id' => 1,
            'email' => 'dinkes@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 2,
            'name' => 'Dinas Pendidikan dan Kebudayaan',
            'skpd_id' => 2,
            'email' => 'diknas@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 3,
            'name' => 'Badan Kepegawaian Daerah',
            'skpd_id' => 3,
            'email' => 'bkd@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 4,
            'name' => 'Badan Kesatuan Bangsa dan Politik',
            'skpd_id' => 4,
            'email' => 'kesbangpol@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 5,
            'name' => 'Badan Keuangan Daerah',
            'skpd_id' => 5,
            'email' => 'keuangan@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 6,
            'name' => 'Badan Penanggulangan Bencana Daerah',
            'skpd_id' => 6,
            'email' => 'bpbd@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 7,
            'name' => 'Badan Perencanaan Pembangunan Daerah',
            'skpd_id' => 7,
            'email' => 'bappeda@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 8,
            'name' => 'Dinas Kependudukan dan Pecatatan Sipil',
            'skpd_id' => 8,
            'email' => 'dukcapil@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 9,
            'name' => 'Dinas Ketahanan Pangan',
            'skpd_id' => 9,
            'email' => 'pangan@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 10,
            'name' => 'Dinas Komunikasi dan Informatika',
            'skpd_id' => 10,
            'email' => 'kominfo@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 11,
            'name' => 'Dinas Koperasi, Usaha Kecil dan Menengah',
            'skpd_id' => 11,
            'email' => 'koperasi@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 12,
            'name' => 'Dinas Lingkungan Hidup',
            'skpd_id' => 12,
            'email' => 'dlh@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 13,
            'name' => 'Dinas Pariwisata, Pemuda dan Olahraga',
            'skpd_id' => 13,
            'email' => 'paripora@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 14,
            'name' => 'Dinas Pekerjaan Umum dan Perumahan Rakyat',
            'skpd_id' => 14,
            'email' => 'pupr@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 15,
            'name' => 'Dinas Pemberdayaan Masyarakat dan Desa',
            'skpd_id' => 15,
            'email' => 'pmd@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 16,
            'name' => 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
            'skpd_id' => 16,
            'email' => 'pmptsp@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 17,
            'name' => 'Dinas Pengelolaan Sumber Daya Air',
            'skpd_id' => 17,
            'email' => 'psda@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 18,
            'name' => 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak',
            'skpd_id' => 18,
            'email' => 'ppkb@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 19,
            'name' => 'Dinas Perhubungan',
            'skpd_id' => 19,
            'email' => 'dishub@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 20,
            'name' => 'Dinas Perikanan',
            'skpd_id' => 20,
            'email' => 'perikanan@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 21,
            'name' => 'Dinas Perindustrian, Perdagangan, Energi dan Sumber Daya Mineral',
            'skpd_id' => 21,
            'email' => 'disperindag@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 22,
            'name' => 'Dinas Perpustakaan dan Kearsipan',
            'skpd_id' => 22,
            'email' => 'perpusarsip@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 23,
            'name' => 'Dinas Pertanian dan Hortikultura',
            'skpd_id' => 23,
            'email' => 'pertanian@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 24,
            'name' => 'Dinas Peternakan dan Perkebunan',
            'skpd_id' => 24,
            'email' => 'peternakan@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 25,
            'name' => 'Dinas Sosial',
            'skpd_id' => 25,
            'email' => 'dinsos@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 26,
            'name' => 'Dinas Tenaga Kerja dan Transmigrasi',
            'skpd_id' => 26,
            'email' => 'nakertrans@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 27,
            'name' => 'Inspektorat',
            'skpd_id' => 27,
            'email' => 'inspektorat@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 28,
            'name' => 'Kecamatan Batulappa',
            'skpd_id' => 28,
            'email' => 'batulappa@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 29,
            'name' => 'Kecamatan Cempa',
            'skpd_id' => 29,
            'email' => 'cempa@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 30,
            'name' => 'Kecamatan Duampanua',
            'skpd_id' => 30,
            'email' => 'duampanua@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 31,
            'name' => 'Kecamatan Lanrisang',
            'skpd_id' => 31,
            'email' => 'lanrisang@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 32,
            'name' => 'Kecamatan Lembang',
            'skpd_id' => 32,
            'email' => 'lembang@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 33,
            'name' => 'Kecamatan Mattiro Bulu',
            'skpd_id' => 33,
            'email' => 'mattirobulu@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 34,
            'name' => 'Kecamatan Mattiro Sompe',
            'skpd_id' => 34,
            'email' => 'mattirosompe@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 35,
            'name' => 'Kecamatan Paleteang',
            'skpd_id' => 35,
            'email' => 'paleteang@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 36,
            'name' => 'Kecamatan Patampanua',
            'skpd_id' => 36,
            'email' => 'patampanua@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 37,
            'name' => 'Kecamatan Suppa',
            'skpd_id' => 37,
            'email' => 'suppa@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 38,
            'name' => 'Kecamatan Tiroang',
            'skpd_id' => 38,
            'email' => 'tiroang@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 39,
            'name' => 'Kecamatan Watang Sawitto',
            'skpd_id' => 39,
            'email' => 'watangsawitto@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 40,
            'name' => 'Rumah Sakit Umum Lasinrang',
            'skpd_id' => 40,
            'email' => 'rsul@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);DB::table('users')->insert([
            'id' => 41,
            'name' => 'Rumah Sakit Pratama Bungi',
            'skpd_id' => 41,
            'email' => 'rspb@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 42,
            'name' => 'Satuan Polisi Pamong Praja',
            'skpd_id' => 42,
            'email' => 'satpol@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 43,
            'name' => 'Sekretariat Daerah',
            'skpd_id' => 43,
            'email' => 'setda@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 44,
            'name' => 'Sekretariat Dewan Pengurus KORPRI',
            'skpd_id' => 44,
            'email' => 'korpri@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
      DB::table('users')->insert([
            'id' => 45,
            'name' => 'Sekretariat Dewan Perwakilan Rakyat Daerah',
            'skpd_id' => 45,
            'email' => 'sekwan@pinrangkab.go.id',
            'password' => Hash::make('112233'),
            'remember_token' => 1
      ]);
    }
}
