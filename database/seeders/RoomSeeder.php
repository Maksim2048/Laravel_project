<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::updateOrCreate([
            'building_id' => '1',
            'room_number' => '100',
            'beds_count' => '3',
            'price' => '2000'
        ]);

        Room::updateOrCreate([
            'building_id' => '1',
            'room_number' => '101',
            'beds_count' => '4',
            'price' => '2200'
        ]);

        Room::updateOrCreate([
            'building_id' => '1',
            'room_number' => '102',
            'beds_count' => '5',
            'price' => '2400'
        ]);

        Room::updateOrCreate([
            'building_id' => '2',
            'room_number' => '200',
            'beds_count' => '5',
            'price' => '3400'
        ]);

    }
}
