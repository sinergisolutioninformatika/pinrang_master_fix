<?php

use Illuminate\Database\Seeder;

class daftar_kecamatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kecamatans')->insert([
            'id' => 1,
            'nmaKecamatan' => 'Watang Sawitto'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 2,
            'nmaKecamatan' => 'Tiroang'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 3,
            'nmaKecamatan' => 'Suppa'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 4,
            'nmaKecamatan' => 'Patampanua'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 5,
            'nmaKecamatan' => 'Paleteang'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 6,
            'nmaKecamatan' => 'Mattiro Sompe'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 7,
            'nmaKecamatan' => 'Mattiro Bulu'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 8,
            'nmaKecamatan' => 'Lembang'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 9,
            'nmaKecamatan' => 'Lanrisang'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 10,
            'nmaKecamatan' => 'Duampanua'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 11,
            'nmaKecamatan' => 'Cempa'
            ]);
    DB::table('kecamatans')->insert([
            'id' => 12,
            'nmaKecamatan' => 'Batulappa'
        ]);
    }
}
