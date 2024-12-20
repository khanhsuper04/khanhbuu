<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tạo 50 bản ghi cho bảng issues
        for ($i = 0; $i < 50; $i++) {
            // Lấy ngẫu nhiên một máy tính từ bảng computers
            $computer_id = Computer::inRandomOrder()->first()->id;

            Issue::create([
                'computer_id' => $computer_id,
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
