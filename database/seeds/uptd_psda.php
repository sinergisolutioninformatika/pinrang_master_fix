<?php

use Illuminate\Database\Seeder;

class uptd_psda extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('uptd_psdas')->insert([
            'id' => 1,
            'nmaUPTD' => 'UPTD Pekkabata'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 2,
            'nmaUPTD' => 'UPTD Sawitto'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 3,
            'nmaUPTD' => 'UPTD Salipolo'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 4,
            'nmaUPTD' => 'UPTD Cempa'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 5,
            'nmaUPTD' => 'UPTD Langnga'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 6,
            'nmaUPTD' => 'UPTD Jampue'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 7,
            'nmaUPTD' => 'UPTD Alitta Carawali'
      ]);
      DB::table('uptd_psdas')->insert([
            'id' => 8,
            'nmaUPTD' => 'UPTD Tiroang'
      ]);
    }
}
