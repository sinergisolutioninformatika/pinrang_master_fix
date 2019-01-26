<?php

use Illuminate\Database\Seeder;

class daftar_koperasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('daftar_koperasis')->insert(['id' => 1,'nmaKoperasi' => 'KUD']);
      DB::table('daftar_koperasis')->insert(['id' => 2,'nmaKoperasi' => 'Koperasi Pertanian']);
      DB::table('daftar_koperasis')->insert(['id' => 3,'nmaKoperasi' => 'Koperasi Perikanan']);
      DB::table('daftar_koperasis')->insert(['id' => 4,'nmaKoperasi' => 'Koperasi Perkebunan']);
      DB::table('daftar_koperasis')->insert(['id' => 5,'nmaKoperasi' => 'Koperasi Peternakan']);
      DB::table('daftar_koperasis')->insert(['id' => 6,'nmaKoperasi' => 'Kopontren']);
      DB::table('daftar_koperasis')->insert(['id' => 7,'nmaKoperasi' => 'Kopinkra']);
      DB::table('daftar_koperasis')->insert(['id' => 8,'nmaKoperasi' => 'Kopti']);
      DB::table('daftar_koperasis')->insert(['id' => 9,'nmaKoperasi' => 'Kopra']);
      DB::table('daftar_koperasis')->insert(['id' => 10,'nmaKoperasi' => 'KPRI']);
      DB::table('daftar_koperasis')->insert(['id' => 11,'nmaKoperasi' => 'Kopkar Non Mandiri']);
      DB::table('daftar_koperasis')->insert(['id' => 12,'nmaKoperasi' => 'Kopkar Mandiri']);
      DB::table('daftar_koperasis')->insert(['id' => 13,'nmaKoperasi' => 'Koperasi Angkatan Darat']);
      DB::table('daftar_koperasis')->insert(['id' => 14,'nmaKoperasi' => 'Koperasi Angkatan Laut']);
      DB::table('daftar_koperasis')->insert(['id' => 15,'nmaKoperasi' => 'Koperasi Angkatan Udara']);
      DB::table('daftar_koperasis')->insert(['id' => 16,'nmaKoperasi' => 'Koperasi Kepolisian']);
      DB::table('daftar_koperasis')->insert(['id' => 17,'nmaKoperasi' => 'Koperasi Serba Usaha']);
      DB::table('daftar_koperasis')->insert(['id' => 18,'nmaKoperasi' => 'Koperasi Pasar']);
      DB::table('daftar_koperasis')->insert(['id' => 19,'nmaKoperasi' => 'Koperasi Simpan Pinjam']);
      DB::table('daftar_koperasis')->insert(['id' => 20,'nmaKoperasi' => 'Koperasi Angkutan Darat']);
      DB::table('daftar_koperasis')->insert(['id' => 21,'nmaKoperasi' => 'Koperasi Angkutan Laut']);
      DB::table('daftar_koperasis')->insert(['id' => 22,'nmaKoperasi' => 'Koperasi Angkutan Udara']);
      DB::table('daftar_koperasis')->insert(['id' => 23,'nmaKoperasi' => 'Koperasi Angkutan Sungai']);
      DB::table('daftar_koperasis')->insert(['id' => 24,'nmaKoperasi' => 'Koperasi Wisata']);
      DB::table('daftar_koperasis')->insert(['id' => 25,'nmaKoperasi' => 'Koperasi Telkom']);
      DB::table('daftar_koperasis')->insert(['id' => 26,'nmaKoperasi' => 'Koperasi Perumahan']);
      DB::table('daftar_koperasis')->insert(['id' => 27,'nmaKoperasi' => 'KPBR']);
      DB::table('daftar_koperasis')->insert(['id' => 28,'nmaKoperasi' => 'Koperasi Listrik Pedesaan']);
      DB::table('daftar_koperasis')->insert(['id' => 29,'nmaKoperasi' => 'Koperasi Asuransi Indonesia']);
    }
}
