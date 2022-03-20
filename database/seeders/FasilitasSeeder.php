<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas = [
            [
                'nama_fasilitas' => 'Kamar Mandi Dalam'
            ],
            [
                'nama_fasilitas' => 'Rak Piring'
            ],
            [
                'nama_fasilitas' => 'AC'
            ],
            [
                'nama_fasilitas' => 'Free Wi-Fi'
            ],
            [
                'nama_fasilitas' => 'Gantungan Baju'
            ],
            [
                'nama_fasilitas' => 'Kasur'
            ],
        ];

        foreach($fasilitas as $v) {
            DB::table('fasilitas')->insert($v);
        }
    }
}
