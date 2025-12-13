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
        Schema::create('car_engines', function (Blueprint $table) {
            $table->id();

            $table
                ->foreignId('generation_id')
                ->constrained('car_generations')
                ->onDelete('cascade');

            $table->string('name', 100);

            $table->enum('fuel_type', [
                'GAS_PETROL',
                'DIESEL',
                'HYBRID',
                'ELECTRIC'
            ]);

            $table->unsignedInteger('displacement');
            $table->unsignedInteger('power');
            $table->unsignedInteger('torque');

            $table->enum('transmission_type', [
                'MANUAL',
                'AUTO'
            ]);

            $table->enum('drive_type', [
                'FWD',
                'AWD',
                'RWD'
            ]);

            $table->string('oil_grade');

            $table
                ->decimal('oil_capacity', 4, 2)
                ->default(0);

            $table->string('oil_change_interval');

            $table->enum('timing_belt_type', [
                'BELT',
                'CHAIN'
            ]);

            $table->string('timing_belt_change_interval');

            $table
                ->decimal('acceleration', 4, 2)
                ->nullable();

            $table
                ->unsignedInteger('max_speed')
                ->nullable();

            $table
                ->decimal('city_consumption', 4, 2)
                ->nullable();

            $table
                ->decimal('avg_consumption', 4, 2)
                ->nullable();

            $table
                ->decimal('route_consumption', 4, 2)
                ->nullable();

            $table
                ->decimal('avg_rating', 4, 2)
                ->nullable();

            $table
                ->unsignedInteger('views_count')
                ->default(0);

            $table
                ->unsignedInteger('reviews_count')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_engines');
    }
};
