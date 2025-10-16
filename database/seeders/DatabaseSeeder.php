<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BuildingSeeder::class);
        // Сначала создаём пользователей (гостей)
        $this->call(UserSeeder::class);
        // Потом комнаты
        $this->call(RoomSeeder::class);
        //в конце проживание
        $this->call(LivingSeeder::class);
    }
}
