<?php

use Illuminate\Database\Seeder;

class daftar_puskesmas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('puskesmas')->insert([
            'id' => 1,
            'nmaPuskesmas' => 'Puskesmas Suppa'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 2,
            'nmaPuskesmas' => 'Puskesmas Ujunglero'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 3,
            'nmaPuskesmas' => 'Puskesmas Mattombong'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 4,
            'nmaPuskesmas' => 'Puskesmas Lanrisang'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 5,
            'nmaPuskesmas' => 'Puskesmas Mattiro Bulu'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 6,
            'nmaPuskesmas' => 'Puskesmas Salo'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 7,
            'nmaPuskesmas' => 'Puskesmas Sulili'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 8,
            'nmaPuskesmas' => 'Puskesmas Mattiro Deceng'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 9,
            'nmaPuskesmas' => 'Puskesmas Teppo'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 10,
            'nmaPuskesmas' => 'Puskesmas Cempa'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 11,
            'nmaPuskesmas' => 'Puskesmas Tadang Palie'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 12,
            'nmaPuskesmas' => 'Puskesmas Bungi'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 13,
            'nmaPuskesmas' => 'Puskesmas Lampa'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 14,
            'nmaPuskesmas' => 'Puskesmas Batulappa'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 15,
            'nmaPuskesmas' => 'Puskesmas Tuppu'
      ]);
      DB::table('puskesmas')->insert([
            'id' => 16,
            'nmaPuskesmas' => 'Puskesmas Salimbongan'
      ]);
    }
}
