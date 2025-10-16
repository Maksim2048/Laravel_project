<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();

//        User::updateOrCreate([
//            'name' => 'Андрей',
//            'email' => 'andr@mail.ru',
//            'phone' => '89334455566',
//        ]);
//
//        User::updateOrCreate([
//            'name' => 'Николай',
//            'email' => 'nikolay@mail.ru',
//            'phone' => '89334455577',
//        ]);
//
//        User::updateOrCreate([
//            'name' => 'Валерия',
//            'email' => 'valeriya@mail.ru',
//            'phone' => '89334455588',
//        ]);
    }
}
