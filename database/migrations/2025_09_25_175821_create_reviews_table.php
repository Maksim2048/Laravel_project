<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('living_id');
            $table->foreign('living_id')->references('id')->on('living')->onDelete('cascade');
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE reviews ADD CONSTRAINT reviews_rating_check CHECK (rating >= 1 AND rating <= 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE reviews DROP CONSTRAINT IF EXISTS reviews_rating_check');
        Schema::dropIfExists('reviews');
    }
};
