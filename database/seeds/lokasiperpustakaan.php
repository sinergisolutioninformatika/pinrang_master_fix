<?php

use Illuminate\Database\Seeder;

class lokasiperpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('lokasiperpustakaans')->insert([
            'id' => 1,
            'nmaLokasi' => 'Perpustakaan Umum/Daerah'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 2,
            'nmaLokasi' => 'Pameran Pembangunan HUT Kabupaten Pinrang'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 3,
            'nmaLokasi' => 'Perpustakaan Keliling'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 4,
            'nmaLokasi' => 'Internet Gratis (Hostpot)'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 5,
            'nmaLokasi' => 'Pengunjung untuk Peminjam & Pengembalian Buku'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 6,
            'nmaLokasi' => 'Lapangan Lasinrang Park'
      ]);
      DB::table('lokasiperpustakaans')->insert([
            'id' => 7,
            'nmaLokasi' => 'Motor Pintar'
      ]);
    }
}
