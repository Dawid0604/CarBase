<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('user_reviews', 'car_generation_reviews');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('car_generation_reviews', 'user_reviews');
    }
};
