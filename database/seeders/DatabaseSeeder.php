<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ComputersSeeder::class);
        $this->call(IssuesSeeder::class);
    }
}
