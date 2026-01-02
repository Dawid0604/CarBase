<?php

declare(strict_types=1);

namespace Database\Factories;

use Override;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarBrand>
 */
final class CarBrandFactory extends Factory
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
        $slug = "$name-" . fake()->numberBetween();

        return [
            'name' => $name,
            'logo' => 'anyDomain?randomId=' . fake()->numberBetween(),
            'slug' => $slug
        ];
    }
}
