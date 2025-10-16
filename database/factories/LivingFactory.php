<?php

namespace Database\Factories;

use App\Models\Living;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivingFactory extends Factory
{
    protected $model = Living::class;

    public function definition(): array
    {
        $currentTime = now(); // текущее время

        // выбираем существующие записи
        $room = Room::inRandomOrder()->first();
        $guest = User::inRandomOrder()->first();

        if (!$room || !$guest) {
            throw new \Exception('Нужны существующие записи Room и User перед сидированием Living');
        }
        /*
         * === 1. Проверка: не живёт ли гость сейчас в какой-то другой комнате ===
         * (Чтобы человек не был "в двух местах одновременно")
         */
        $activeStay = Living::where('guest_id', $guest->id)
            ->where('check_out_date', '>', $currentTime) // ещё не выехал
            ->exists();

        if ($activeStay) {
            // Этот гость уже где-то живёт, попробуем другого
            // (рекурсивно создаём новую запись)
            return $this->definition();
        }

        /*
         * === 2. Проверка: не переполнена ли комната ===
         * (Количество активных жильцов < beds_count)
         */
        $currentOccupants = Living::where('room_id', $room->id)
            ->where('check_out_date', '>', $currentTime) // кто ещё живёт
            ->count();

        if ($currentOccupants >= $room->beds_count) {
            // Комната полная — ищем другую
            return $this->definition();
        }

        /*
         * === 3. Определяем даты проживания ===
         * Если этот гость уже жил в этой комнате раньше — новое заселение
         * начинается с даты после последнего выезда.
         */
        $lastStay = Living::where('room_id', $room->id)
            ->where('guest_id', $guest->id)
            ->orderByDesc('check_out_date')
            ->first();

        if ($lastStay) {
            $checkIn = (clone $lastStay->check_out_date)->modify('+' . rand(0, 2) . ' days');
        } else {
            $checkIn = $this->faker->dateTimeBetween('-8 days', '+3 days');
        }

        $checkOut = (clone $checkIn)->modify('+' . rand(1, 10) . ' days');

        // считаем количество дней проживания
        $days = $checkIn->diff($checkOut)->days ?: 1;

        // считаем итоговую стоимость
        $totalPrice = $room->price * $days;

        // Статус зависит от дат
        if ($checkOut > $currentTime) {
            $status = 'active';
        } else {
            $status = 'completed';
        }

        return [
            'room_id' => $room->id,
            'guest_id' => $guest->id,
            'check_in_date' => $checkIn,
            'check_out_date' => $checkOut,
            'status' => $status,
            'total_price' => $totalPrice,
            'guests_count' => $this->faker->numberBetween(1, 5),
        ];
    }
}
