<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('living', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('guest_id');
            $table->foreign('guest_id')->references('id')->on('users')->onDelete('set null');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guests_count');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('active');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE living ADD CONSTRAINT living_check CHECK (check_out_date > check_in_date)');
        DB::statement('ALTER TABLE living ADD CONSTRAINT living_guests_count_check CHECK (guests_count > 0)');
        DB::statement("ALTER TABLE living ADD CONSTRAINT living_status_check
            CHECK (status IN ('active', 'completed'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE living DROP CONSTRAINT IF EXISTS living_check');
        DB::statement('ALTER TABLE living DROP CONSTRAINT IF EXISTS living_guests_count_check');
        DB::statement('ALTER TABLE living DROP CONSTRAINT IF EXISTS living_status_check');
        Schema::dropIfExists('living');
    }
};
