<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            [
                'name' => 'Ibnu Syawal As-Salim',
                'username' => 'admin',
                'password' => bcrypt('Admin12345'),
                'role' => 'admin',
                'status' => NULL
            ],
            [
                'name' => 'Arya Wijaya',
                'username' => 'arya',
                'password' => bcrypt('Arya12345'),
                'role' => 'user',
                'status' => 'sudah_bayar'
            ],
            [
                'name' => 'Dafi Nurohman',
                'username' => 'dafi',
                'password' => bcrypt('Dafi12345'),
                'role' => 'user',
                'status' => 'belum_bayar'
            ],
            [
                'name' => 'Ajid Soleh',
                'username' => 'ajid',
                'password' => bcrypt('Ajid12345'),
                'role' => 'user',
                'status' => 'belum_bayar'
            ]
        ];

        foreach($user as $v) {
            DB::table('users')->insert($v);
        }
    }
}
