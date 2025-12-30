<?php

declare(strict_types=1);

namespace Database\Factories;

use Override;
use App\Models\CarBrand;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\{EngineFuelType, EngineInjectionType, EngineLayout, LpgCompability};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Engine>
 */
final class EngineFactory extends Factory
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
            'name' => $name,
            'slug' => $slug,
            'description' => fake()->sentence(),
            'advantages' => [
                'trwała konstrukcja',
                'bardzo dobra dynamika',
                'wysoka kultura pracy'
            ],
            'disadvantages' => [
                'drogi serwis',
                'problemy z odmą'
            ],
            'turbocharger' => fake()->boolean(),
            'valve_count' => fake()->numberBetween(1, 24),
            'rating' => fake()->numberBetween(1, 5),
            'reliability' => fake()->numberBetween(1, 5),
            'consumption' => fake()->numberBetween(1, 5),
            'dynamic' => fake()->numberBetween(1, 5),
            'number_of_views' => fake()->numberBetween(),
            'power' => fake()->numberBetween(30, 510),
            'lpg' => fake()->randomElement(LpgCompability::cases()),
            'engine_layout' => fake()->randomElement(EngineLayout::cases()),
            'injection_type' => fake()->randomElement(EngineInjectionType::cases()),
            'fuel_type' => fake()->randomElement(EngineFuelType::cases()),
            'brand_id' => CarBrand::factory()
        ];
    }
}
