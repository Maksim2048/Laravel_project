<?php

namespace Database\Seeders;

use App\Models\Living;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivingSeeder extends Seeder
{
    public function run(): void
    {
        Living::factory()->count(5)->create();
    }
}
