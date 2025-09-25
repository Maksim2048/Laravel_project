<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->UnsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guests_count');
            $table->string('status')->default('active');
            $table->timestamps();
        });
        // Ограничения CHECK через raw SQL
        DB::statement('ALTER TABLE bookings ADD CONSTRAINT bookings_check CHECK (check_out_date > check_in_date)');
        DB::statement('ALTER TABLE bookings ADD CONSTRAINT bookings_guests_count_check CHECK (guests_count > 0)');
        DB::statement("ALTER TABLE bookings ADD CONSTRAINT bookings_status_check
        CHECK (status IN ('active', 'cancelled', 'completed'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_check');
        DB::statement('ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_guests_count_check');
        DB::statement('ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_status_check');

        Schema::dropIfExists('bookings');
    }
};
