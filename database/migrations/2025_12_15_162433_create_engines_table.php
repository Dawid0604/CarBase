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
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->text('description');
            $table->json('advantages');
            $table->json('disadvantages');

            $table->enum('lpg', [
                'UNAVAILABLE',
                'POOR',
                'GOOD'
            ]);

            $table->boolean('turbocharger');
            $table->string('engine_layout');
            $table->unsignedTinyInteger('valve_count');
            $table->string('injection_type');

            $table
                ->decimal('rating', 5, 2)
                ->default(0);

            $table
                ->unsignedInteger('reliability')
                ->default(0);

            $table
                ->unsignedInteger('consumption')
                ->default(0);

            $table
                ->unsignedInteger('dynamic')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engines');
    }
};
