<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CarEngine;
use Illuminate\Database\Seeder;
use App\Enums\CarTimingBeltType;

final class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carEngines = [
            [
                'id' => 1,
                'generation_id' => 1,
                'engine_id' => 1,
                'name' => '1.75 TBi 16V QV 235KM',
                'displacement' => 1742,
                'power' => 235,
                'torque' => 300,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => '5W30',
                'oil_capacity' => 5.0,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [
                    'km' => 100000,
                    'year' => 5
                ],
                'acceleration' => 6.8,
                'max_speed' => 241,
                'city_consumption' => 10.8,
                'avg_consumption' => 7.6,
                'route_consumption' => 5.8
            ],
            [
                'id' => 2,
                'generation_id' => 1,
                'engine_id' => 2,
                'name' => '1.4 TB 16V 120KM',
                'displacement' => 1368,
                'power' => 120,
                'torque' => 206,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'SAE 5W40 ACEA/C3',
                'oil_capacity' => 2.9,
                'oil_change_interval' => [
                    'km' => 20000,
                    'year' => 1
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 9.4,
                'max_speed' => 195,
                'city_consumption' => 8.4,
                'avg_consumption' => 6.4,
                'route_consumption' => 5.3
            ],
            [
                'id' => 3,
                'generation_id' => 1,
                'engine_id' => 3,
                'name' => '1.4 TB 16V 105KM',
                'displacement' => 1368,
                'power' => 105,
                'torque' => 206,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W30',
                'oil_capacity' => 2.9,
                'oil_change_interval' => [
                    'km' => 20000,
                    'year' => 1
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 10.6,
                'max_speed' => 185,
                'city_consumption' => 8.3,
                'avg_consumption' => 6.4,
                'route_consumption' => 5.3
            ],
            [
                'id' => 4,
                'generation_id' => 1,
                'engine_id' => 4,
                'name' => '1.4 TB 16V MultiAir 170KM',
                'displacement' => 1368,
                'power' => 170,
                'torque' => 229,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W30',
                'oil_capacity' => 3.4,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 7.8,
                'max_speed' => 217,
                'city_consumption' => 7.8,
                'avg_consumption' => 5.8,
                'route_consumption' => 4.6
            ],
            [
                'id' => 5,
                'generation_id' => 2,
                'engine_id' => 1,
                'name' => '1.75 TBi 16V QV 240KM',
                'displacement' => 1742,
                'power' => 240,
                'torque' => 340,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => '5W30',
                'oil_capacity' => 5.0,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [
                    'km' => 100000,
                    'year' => 5
                ],
                'acceleration' => 6.6,
                'max_speed' => 244,
                'city_consumption' => 10.2,
                'avg_consumption' => 7.3,
                'route_consumption' => 5.6
            ],
            [
                'id' => 6,
                'generation_id' => 2,
                'engine_id' => 2,
                'name' => '1.4 TB 16V 120KM',
                'displacement' => 1368,
                'power' => 120,
                'torque' => 215,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'SAE 5W40 ACEA/C3',
                'oil_capacity' => 2.9,
                'oil_change_interval' => [
                    'km' => 20000,
                    'year' => 1
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 9.4,
                'max_speed' => 195,
                'city_consumption' => 8.1,
                'avg_consumption' => 6.2,
                'route_consumption' => 5.1
            ],
            [
                'id' => 7,
                'generation_id' => 2,
                'engine_id' => 5,
                'name' => '1.4 TB 16V MultiAir 150KM',
                'displacement' => 1368,
                'power' => 150,
                'torque' => 250,
                'transmission_types' => [
                    'MANUAL',
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W30',
                'oil_capacity' => 3.4,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 8.2,
                'max_speed' => 210,
                'city_consumption' => 7.4,
                'avg_consumption' => 5.5,
                'route_consumption' => 4.4
            ],
            [
                'id' => 8,
                'generation_id' => 3,
                'engine_id' => 6,
                'name' => '2.0 16V Turbo MultiAir 200KM',
                'displacement' => 1995,
                'power' => 200,
                'torque' => 330,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W40',
                'oil_capacity' => 4,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 7.2,
                'max_speed' => 215,
                'city_consumption' => 8.9,
                'avg_consumption' => 7.0,
                'route_consumption' => 5.9
            ],
            [
                'id' => 9,
                'generation_id' => 3,
                'engine_id' => 6,
                'name' => '2.0 16V Turbo MultiAir 280KM',
                'displacement' => 1995,
                'power' => 280,
                'torque' => 400,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W40',
                'oil_capacity' => 4,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [
                    'km' => 120000,
                    'year' => 5
                ],
                'acceleration' => 5.7,
                'max_speed' => 230,
                'city_consumption' => 8.9,
                'avg_consumption' => 7.0,
                'route_consumption' => 5.9
            ],
            [
                'id' => 10,
                'generation_id' => 3,
                'engine_id' => 7,
                'name' => '2.9 V6 24V BiTurbo QV 510KM',
                'displacement' => 2891,
                'power' => 510,
                'torque' => 600,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W40',
                'oil_capacity' => 7,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [],
                'acceleration' => 3.8,
                'max_speed' => 283,
                'city_consumption' => 11.7,
                'avg_consumption' => 9.0,
                'route_consumption' => 7.5
            ],
            [
                'id' => 11,
                'generation_id' => 3,
                'engine_id' => 7,
                'name' => '2.9 V6 24V BiTurbo QV 520KM',
                'displacement' => 2891,
                'power' => 520,
                'torque' => 600,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => 'Selenia 5W40',
                'oil_capacity' => 7,
                'oil_change_interval' => [
                    'km' => 30000,
                    'year' => 2
                ],
                'timing_belt_type' => CarTimingBeltType::CHAIN,
                'timing_belt_change_interval' => [],
                'acceleration' => 3.8,
                'max_speed' => 285,
                'city_consumption' => 17.5,
                'avg_consumption' => 11.8,
                'route_consumption' => 10.1
            ],
            [
                'id' => 12,
                'generation_id' => 4,
                'engine_id' => 8,
                'name' => '1.5 16V FireFly Turbo 48V-Hybrid 130KM',
                'displacement' => 1469,
                'power' => 130,
                'torque' => 240,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => '0W-20 FIAT 9.55535-DM1',
                'oil_capacity' => 4.2,
                'oil_change_interval' => [
                    'km' => 20000,
                    'year' => 1
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [],
                'acceleration' => 9.6,
                'max_speed' => 195,
                'city_consumption' => 6.6,
                'avg_consumption' => 6.1,
                'route_consumption' => 5.4
            ],
            [
                'id' => 13,
                'generation_id' => 4,
                'engine_id' => 9,
                'name' => '1.5 16V FireFly VGT 48V-Hybrid 160KM',
                'displacement' => 1469,
                'power' => 160,
                'torque' => 240,
                'transmission_types' => [
                    'AUTOMATIC'
                ],
                'drive_types' => [
                    'FWD'
                ],
                'oil_grade' => '0W-20 FIAT 9.55535-DM1',
                'oil_capacity' => 4.2,
                'oil_change_interval' => [
                    'km' => 20000,
                    'year' => 1
                ],
                'timing_belt_type' => CarTimingBeltType::BELT,
                'timing_belt_change_interval' => [],
                'acceleration' => 8.8,
                'max_speed' => 210,
                'city_consumption' => 6.8,
                'avg_consumption' => 6.5,
                'route_consumption' => 5.7
            ]
        ];

        foreach ($carEngines as $engine) {
            $model = CarEngine::create([
                'id' => $engine['id'],
                'engine_id' => $engine['engine_id'],
                'name' => $engine['name'],
                'displacement' => $engine['displacement'],
                'power' => $engine['power'],
                'torque' => $engine['torque'],
                'transmission_types' => $engine['transmission_types'],
                'drive_types' => $engine['drive_types'],
                'oil_grade' => $engine['oil_grade'],
                'oil_capacity' => $engine['oil_capacity'],
                'oil_change_interval' => $engine['oil_change_interval'],
                'timing_belt_type' => $engine['timing_belt_type'],
                'timing_belt_change_interval' => $engine['timing_belt_change_interval'],
                'acceleration' => $engine['acceleration'],
                'max_speed' => $engine['max_speed'],
                'city_consumption' => $engine['city_consumption'],
                'avg_consumption' => $engine['avg_consumption'],
                'route_consumption' => $engine['route_consumption'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $model->generations()->syncWithoutDetaching($engine['generation_id']);
        }

        $this
            ->command
            ->info('Successfully imported ' . \count($carEngines) . ' carEngines');
    }
}
