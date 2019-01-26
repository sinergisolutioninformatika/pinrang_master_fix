<?php

use Illuminate\Database\Seeder;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kategoris')->insert([
            'id' => 1,
            'nmaKategori' => 'Sarana dan Infrastruktur'
          ]);
      DB::table('kategoris')->insert([
            'id' => 2,
            'nmaKategori' => 'Ekonomi dan Pembangunan'
          ]);
      DB::table('kategoris')->insert([
            'id' => 3,
            'nmaKategori' => 'Sosial dan Kesejahteraan Masyarakat'
          ]);
      DB::table('kategoris')->insert([
            'id' => 4,
            'nmaKategori' => 'Kebijakan dan Legislasi'
          ]);
      DB::table('kategoris')->insert([
            'id' => 5,
            'nmaKategori' => 'Manajemen Pemerintahan'
          ]);
    }
}
