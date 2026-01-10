<?php

declare(strict_types=1);

namespace Database\Factories;

use Override;
use App\Models\CarBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarModel>
 */
final class CarModelFactory extends Factory
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

        return [
            'brand_id' => CarBrand::factory()->make(),
            'name' => $name,
            'slug' => $slug
        ];
    }
}
