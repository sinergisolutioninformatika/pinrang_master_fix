<?php

use Illuminate\Database\Seeder;

class masalahsosial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('masalahsosials')->insert([
            'id' => 1,
            'nmaMasalah' => 'Anak Balita Terlantar (ABT)'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 2,
            'nmaMasalah' => 'Anak Terlantar (AT)'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 3,
            'nmaMasalah' => 'Anak yang Berhadapan dengan hukum'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 4,
            'nmaMasalah' => 'Anak Jalanan'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 5,
            'nmaMasalah' => 'Anakan dengan kedisabilitas'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 6,
            'nmaMasalah' => 'Anak Korban Tindak Kekerasan'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 7,
            'nmaMasalah' => 'Anak Yang memerlukan Perlindungan Khusus'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 8,
            'nmaMasalah' => 'Lanjut Usia Terlantar'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 9,
            'nmaMasalah' => 'Penyandang disabilitas'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 10,
            'nmaMasalah' => 'Tuna Susila'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 11,
            'nmaMasalah' => 'Gelandangan'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 12,
            'nmaMasalah' => 'Pemulung'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 13,
            'nmaMasalah' => 'Kelompok Minoritas'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 14,
            'nmaMasalah' => 'Bekas Warga Binaan Lembaga Pemasyarakatan (BWBLP)'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 15,
            'nmaMasalah' => 'Orang dengan HIV/AIDS (ODHA)'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 16,
            'nmaMasalah' => 'Korban Penyalagunaan NAPZA'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 17,
            'nmaMasalah' => 'Korban traffiking'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 18,
            'nmaMasalah' => 'Perempuan rawan sosial ekonomi'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 19,
            'nmaMasalah' => 'Fakir Miskin'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 20,
            'nmaMasalah' => 'Keluarga bermasalah sosial psikologis'
      ]);
      DB::table('masalahsosials')->insert([
            'id' => 21,
            'nmaMasalah' => 'Komunitas Adat Terpencil'
      ]);
    }
}
