<?php

use Illuminate\Database\Seeder;

class bencana extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bencanas')->insert([
            'id' => 1,
            'nmaBencana' => 'Banjir'
      ]);
      DB::table('bencanas')->insert([
            'id' => 2,
            'nmaBencana' => 'Tanah Longsor'
      ]);
      DB::table('bencanas')->insert([
            'id' => 3,
            'nmaBencana' => 'Kebakaran Hutan'
      ]);
      DB::table('bencanas')->insert([
            'id' => 4,
            'nmaBencana' => 'Gempa Bumi'
      ]);
      DB::table('bencanas')->insert([
            'id' => 5,
            'nmaBencana' => 'Tsunami'
      ]);
      DB::table('bencanas')->insert([
            'id' => 6,
            'nmaBencana' => 'Kekeringan Air'
      ]);
      DB::table('bencanas')->insert([
            'id' => 7,
            'nmaBencana' => 'Gunung Meletus'
      ]);
      DB::table('bencanas')->insert([
            'id' => 8,
            'nmaBencana' => 'Angin Topan/Angin Putting Beliung'
      ]);
      DB::table('bencanas')->insert([
            'id' => 9,
            'nmaBencana' => 'Badai Tropis'
      ]);
    }
}
