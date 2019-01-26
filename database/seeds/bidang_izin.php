<?php

use Illuminate\Database\Seeder;

class bidang_izin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bidang_izins')->insert([
            'id' => 1,
            'nmaBidang' => 'Bidang Pendidikan'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 2,
            'nmaBidang' => 'Bidang Kesehatan'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 3,
            'nmaBidang' => 'Bidang Pariwisata'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 4,
            'nmaBidang' => 'Bidang Penanaman Modal'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 5,
            'nmaBidang' => 'Bidang Perindustrian'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 6,
            'nmaBidang' => 'Bidang Perdagangan'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 7,
            'nmaBidang' => 'Bidang Ketenteraman dan Ketertiban Umum'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 8,
            'nmaBidang' => 'Bidang Perumahan Rakyat dan Penataan Ruang'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 9,
            'nmaBidang' => 'Bidang Perumahan Rakyat Dan Kawasan Permukiman'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 10,
            'nmaBidang' => 'Bidang Pertanahan'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 11,
            'nmaBidang' => 'Bidang Pertanian'
      ]);
      DB::table('bidang_izins')->insert([
            'id' => 12,
            'nmaBidang' => 'Bidang Perikanan'
      ]);
    }
}
