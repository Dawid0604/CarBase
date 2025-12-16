<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\EngineFuelType;
use App\Models\Engine;
use App\Models\EngineInjectionType;
use App\Models\EngineLayout;
use App\Models\LpgCompability;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engines = [
            [
                'id' => 1,
                'brand_id' => 1,
                'name' => '1.75 16V TBi',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "trwała konstrukcja",
                    "bardzo dobra dynamika",
                    "wysoka kultura pracy"
                ],
                'disadvantages' => [
                    "kosztowny serwis",
                    "drogie części-oryginały",
                    "wadliwy napinacz rozrządu",
                    "awarie turbosprężarki",
                    "problemy z sondą lambda",
                    "wysokie spalanie"
                ],
                'power' => 235,
                'fuel_type' => EngineFuelType::GASOLINE,
                'displacement' => 1742,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::DIRECT
            ],
            [
                'id' => 2,
                'brand_id' => 11,
                'name' => '1.4 16V T-Jet 120KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "trwała konstrukcja",
                    "bardzo dobra dynamika",
                    "przyzwoity poziom spalania"
                ],
                'disadvantages' => [
                    "Awarie Turbiny -pękające korpusy",
                    "awarie układu cieczy chłodzącej-ubytki płynu",
                    "szybkie zużycie sprzęgła w mocniejszych wersjach"
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 120,
                'lpg' => LpgCompability::GOOD,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::MULTIPOINT
            ],
            [
                'id' => 3,
                'brand_id' => 11,
                'name' => '1.4 16V T-Jet 105KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "trwała konstrukcja",
                    "dobra elstyczność",
                    "przyzwoity poziom spalania"
                ],
                'disadvantages' => [
                    "słaba dynamika"
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 105,
                'lpg' => LpgCompability::GOOD,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::MULTIPOINT
            ],
            [
                'id' => 4,
                'brand_id' => 11,
                'name' => '1.4 16V MultiAir 170KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "trwała konstrukcja",
                    "bardzo dobra dynamika",
                    "wysoka kultura pracy",
                    'dobra elastyczność',
                    'przyzwoity poziom spalania'
                ],
                'disadvantages' => [
                    "Awarie modułu Multiair",
                    'Awarie turbosprężarki/zatkanie filtra w przewodzie doprowadzającym olej do turbo'
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 170,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::MULTIPOINT
            ],
            [
                'id' => 5,
                'brand_id' => 11,
                'name' => '1.4 16V MultiAir 150KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "trwała konstrukcja",
                    "bardzo dobra dynamika",
                    "wysoka kultura pracy",
                    'dobra elastyczność',
                    'przyzwoity poziom spalania'
                ],
                'disadvantages' => [
                    "Awarie modułu Multiair",
                    'Awarie turbosprężarki/zatkanie filtra w przewodzie doprowadzającym olej do turbo'
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 150,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::MULTIPOINT
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'name' => '2.0 16V MultiAir 200KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "nowoczesna konstrukcja",
                    "bardzo dobre osiągi",
                    "bardzo dobra dynamika",
                    'świetna elastyczność',
                    'przyzwoity poziom spalania'
                ],
                'disadvantages' => [
                    "wysokie koszty serwisu"
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 200,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::DIRECT
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'name' => '2.9 V6 24V BiTurbo',
                'description' => 'lorem ipsum',
                'advantages' => [
                    "nowoczesna konstrukcja",
                    'wysoka kultura pracy',
                    "świetne osiągi",
                    "bardzo dobra dynamika",
                    'niski poziom spalania'
                ],
                'disadvantages' => [
                    "wysokie koszty serwisu"
                ],
                'fuel_type' => EngineFuelType::GASOLINE,
                'power' => 510,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::V6,
                'valve_count' => 24,
                'injection_type' => EngineInjectionType::DIRECT
            ],
            [
                'id' => 8,
                'brand_id' => 11,
                'name' => '1.5 16V T4 FireFly e-Hybrid 130KM',
                'description' => 'lorem ipsum',
                'advantages' => [
                    'wysoka kultura pracy',
                    "bardzo dobra dynamika",
                    'niski poziom spalania'
                ],
                'disadvantages' => [],
                'fuel_type' => EngineFuelType::HYBRID,
                'power' => 130,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::DIRECT
            ],
            [
                'id' => 9,
                'brand_id' => 11,
                'name' => '1.5 16V T4 FireFly e-Hybrid 160KM VGT',
                'description' => 'lorem ipsum',
                'advantages' => [
                    'wysoka kultura pracy',
                    "bardzo dobra dynamika",
                    'niski poziom spalania'
                ],
                'disadvantages' => [],
                'fuel_type' => EngineFuelType::HYBRID,
                'power' => 130,
                'lpg' => LpgCompability::POOR,
                'turbocharger' => true,
                'engine_layout' => EngineLayout::FOUR,
                'valve_count' => 16,
                'injection_type' => EngineInjectionType::DIRECT
            ]
        ];

        foreach ($engines as $engine) {
            Engine::create([
                'id' => $engine['id'],
                'brand_id' => $engine['brand_id'],
                'name' => $engine['name'],
                'description' => $engine['description'],
                'advantages' => $engine['advantages'],
                'disadvantages' => $engine['disadvantages'],
                'fuel_type' => $engine['fuel_type'],
                'power' => $engine['power'],
                'lpg' => $engine['lpg'],
                'turbocharger' => $engine['turbocharger'],
                'engine_layout' => $engine['engine_layout'],
                'valve_count' => $engine['valve_count'],
                'injection_type' => $engine['injection_type'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        $this
            ->command
            ->info('Successfully imported ' . \count($engines) . ' engines');
    }
}
