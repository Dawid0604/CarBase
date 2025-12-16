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
        Schema::table('car_engines', function (Blueprint $table) {
            $table->dropConstrainedForeignId('generation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_engines', function (Blueprint $table) {
            $table
                ->foreignId('generation_id')
                ->constrained('car_generations')
                ->onDelete('cascade');
        });
    }
};
