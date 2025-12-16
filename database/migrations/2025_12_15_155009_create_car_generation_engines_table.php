<?php

declare(strict_types=1);

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
        Schema::create('car_generation_engines', function (Blueprint $table) {
            $table
                ->foreignId('generation_id')
                ->constrained('car_generations')
                ->onDelete('cascade');

            $table
                ->foreignId('engine_id')
                ->constrained('car_engines')
                ->onDelete('cascade');

            $table->unique([
                'generation_id',
                'engine_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_generation_engines');
    }
};
