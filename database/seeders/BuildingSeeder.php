<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Building;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Building::create([
            'name' => 'Эконом'
        ]);
        Building::create([
            'name' => 'Стандарт'
        ]);
        Building::create([
            'name' => 'Бизнес'
        ]);
        Building::create([
            'name' => 'Люкс'
        ]);
    }
}
