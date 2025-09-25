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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->string('room_number', 10);
            $table->integer('beds_count');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE rooms ADD CONSTRAINT rooms_building_id_room_number_key UNIQUE (building_id, room_number)');
        DB::statement('ALTER TABLE rooms ADD CONSTRAINT rooms_beds_count_check CHECK (beds_count > 0)');
        DB::statement('ALTER TABLE rooms ADD CONSTRAINT rooms_price_check CHECK (price > 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE rooms DROP CONSTRAINT IF EXISTS rooms_building_id_room_number_key');
        DB::statement('ALTER TABLE rooms DROP CONSTRAINT IF EXISTS rooms_beds_count_check');
        DB::statement('ALTER TABLE rooms DROP CONSTRAINT IF EXISTS rooms_price_check');
        Schema::dropIfExists('rooms');
    }
};
