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
        Schema::table('users', function (Blueprint $table) {

            $table
                ->string('nickname', 64)
                ->nullable()
                ->unique();

            $table
                ->string('avatar', 256)
                ->nullable();

            $table
                ->enum('role', [
                    'USER',
                    'ADMIN'
                ])
                ->default('USER');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('avatar');
            $table->dropColumn('role');
        });
    }
};
