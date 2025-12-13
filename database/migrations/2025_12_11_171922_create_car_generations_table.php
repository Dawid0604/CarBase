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
        Schema::create('car_generations', function (Blueprint $table) {
            $table->id();

            $table
                ->foreignId('model_id')
                ->constrained('car_models')
                ->onDelete('cascade');

            $table->string('name', 100);
            $table->unsignedInteger('production_from');

            $table
                ->unsignedInteger('production_to')
                ->nullable();

            $table
                ->string('image', 256)
                ->nullable();

            $table
                ->enum('type', [
                    'A',
                    'B',
                    'C',
                    'D',
                    'E',
                    'F'
                ])
                ->comment('Car segment: A=mini, B=small, C=medium, D=large, E=executive, F=luxury');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_generations');
    }
};
