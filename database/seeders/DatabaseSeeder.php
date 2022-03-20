<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            UserSeeder::class,
            FasilitasSeeder::class,
        ];

        $this->call($seeds);

    }
}
