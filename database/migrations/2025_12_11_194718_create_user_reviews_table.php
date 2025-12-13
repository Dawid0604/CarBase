<?php

declare(strict_types=1);

use Carbon\Carbon;
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
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->id();

            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table
                ->foreignId('engine_id')
                ->constrained('car_engines')
                ->onDelete('cascade');

            $table
                ->unsignedInteger('rating')
                ->default(0);

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
                ->unsignedInteger('reliability')
                ->default(0);

            $table
                ->unsignedInteger('comfort')
                ->default(0);

            $table
                ->unsignedInteger('consumption')
                ->default(0);

            $table
                ->unsignedInteger('maintenance_costs')
                ->default(0);

            $table
                ->text('comment')
                ->nullable();

            $table
                ->boolean('recommendation')
                ->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
