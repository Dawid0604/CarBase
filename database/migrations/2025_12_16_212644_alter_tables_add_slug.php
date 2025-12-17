<?php

declare(strict_types=1);

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\{CarBrand, CarEngine, CarGeneration, CarModel, Engine};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add slug column
        $this->createSlugColumn('engines');
        $this->createSlugColumn('car_brands');
        $this->createSlugColumn('car_models');
        $this->createSlugColumn('car_generations');
        $this->createSlugColumn('car_engines');

        // Fill data
        Engine::get()
            ->each(function ($engine) {
                $brandName = $engine->brand->name;
                $slug = Str::slug("$brandName-$engine->name-$engine->id");

                $engine->update([
                    'slug' => $slug
                ]);
            });

        CarBrand::get()
            ->each(function ($brand) {
                $slug = Str::slug("$brand->name-$brand->id");

                $brand->update([
                    'slug' => $slug
                ]);
            });

        CarModel::get()
            ->each(function ($model) {
                $brandName = $model->brand->name;
                $slug = Str::slug("$brandName-$model->name-$model->id");

                $model->update([
                    'slug' => $slug
                ]);
            });

        CarGeneration::get()
            ->each(function ($generation) {
                $model = $generation->model;
                $generationName = empty($generation->name) ? '' : "-$generation->name";
                $brandName = $model->brand->name;
                $slug = Str::slug("$brandName-$model->name$generationName-$generation->id");

                $generation->update([
                    'slug' => $slug
                ]);
            });

        CarEngine::get()
            ->each(function ($carEngine) {
                $generations = $carEngine->generations;

                foreach ($generations as $generation) {
                    $model = $generation->model;
                    $generationName = empty($generation->name) ? '' : "-$generation->name";
                    $brandName = $model->brand->name;
                    $slug = Str::slug("$brandName-$model->name$generationName-$carEngine->name-$generation->id");

                    $carEngine->update([
                        'slug' => $slug
                    ]);
                }
            });

        // Change slug to non-nullable
        $this->changeSlugToNonNullable('engines');
        $this->changeSlugToNonNullable('car_brands');
        $this->changeSlugToNonNullable('car_models');
        $this->changeSlugToNonNullable('car_generations');
        $this->changeSlugToNonNullable('car_engines');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropSlugColumn('engines');
        $this->dropSlugColumn('car_brands');
        $this->dropSlugColumn('car_models');
        $this->dropSlugColumn('car_generations');
        $this->dropSlugColumn('car_engines');
    }

    private function createSlugColumn(string $tableName): void
    {
        Schema::table($tableName, function (Blueprint $table) {
            $table
                ->string('slug')
                ->nullable()
                ->unique()
                ->after('name');
        });
    }

    private function changeSlugToNonNullable(string $tableName): void
    {
        Schema::table($tableName, function (Blueprint $table) {
            $table
                ->string('slug')
                ->change();
        });
    }

    private function dropSlugColumn(string $tableName): void
    {
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
