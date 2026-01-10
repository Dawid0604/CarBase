<?php

declare(strict_types=1);

namespace Database\Factories;

use Override;
use App\Enums\CarType;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarGeneration>
 */
final class CarGenerationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function definition(): array
    {
        $name = fake()->name();
        $slug = $name . '-' . fake()->numberBetween();
        $productionFrom = fake()->numberBetween(1990, 2025);
        $productionTo = fake()->randomElement([
            fake()->numberBetween($productionFrom + 1, $productionFrom + 50),
            null
        ]);

        return [
            'model_id' => CarModel::factory(),
            'name' => $name,
            'slug' => $slug,
            'production_from' => $productionFrom,
            'production_to' => $productionTo,
            'image' => 'anyDomain?randomId=' . fake()->numberBetween(),
            'type' => fake()->randomElement(CarType::cases())
        ];
    }
}
