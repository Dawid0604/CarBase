<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('car_engines', function (Blueprint $table) {
            $table->renameColumn('transmission_type', 'transmission_types');
            $table->renameColumn('drive_type', 'drive_types');
        });

        DB::statement("
            ALTER TABLE car_engines
            MODIFY COLUMN transmission_types
            SET (
                'MANUAL',
                'AUTOMATIC',
                'CVT',
                'DCT',
                'DSG',
                'AMT',
                'TIPTRONIC'
            )
        ");

        DB::statement("
            ALTER TABLE car_engines
            MODIFY COLUMN drive_types
            SET (
                'FWD',
                'AWD',
                'RWD'
            )
        ");

        DB::statement('
            ALTER TABLE car_engines
            MODIFY COLUMN timing_belt_change_interval
            JSON
        ');

        DB::statement('
            ALTER TABLE car_engines
            MODIFY COLUMN oil_change_interval
            JSON
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_engines', function (Blueprint $table) {
            $table->renameColumn('transmission_types', 'transmission_type');
            $table->renameColumn('drive_types', 'drive_type');
        });

        DB::statement("
            ALTER TABLE car_engines
            MODIFY COLUMN transmission_type
            ENUM (
                'MANUAL',
                'AUTOMATIC',
                'CVT',
                'DCT',
                'DSG',
                'AMT',
                'TIPTRONIC'
            )
        ");

        DB::statement("
            ALTER TABLE car_engines
            MODIFY COLUMN drive_type
            ENUM (
                'FWD',
                'AWD',
                'RWD'
            )
        ");

        DB::statement('
            ALTER TABLE car_engines
            CHANGE COLUMN timing_belt_change_interval
            string
        ');

        DB::statement('
            ALTER TABLE car_engines
            CHANGE COLUMN oil_change_interval
            string
        ');
    }
};
