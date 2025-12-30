<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use App\Enums\CarType;
use App\Models\CarGeneration;
use Illuminate\Database\Seeder;

final class CarGenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generations = [
            [
                'id' => 1,
                'model_id' => 1,
                'name' => '',
                'production_from' => 2010,
                'production_to' => 2016,
                'image' => 'https://www.motobenzyna.pl/wp-content/uploads/img_alfa-romeo-giulietta.jpg',
                'type' => CarType::C,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'model_id' => 1,
                'name' => 'FL',
                'production_from' => 2016,
                'production_to' => 2020,
                'image' => 'https://www.motobenzyna.pl/wp-content/uploads/img_alfa-romeo-giulietta-fl.jpg',
                'type' => CarType::C,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'model_id' => 2,
                'name' => '',
                'production_from' => 2017,
                'production_to' => 2022,
                'image' => 'https://www.motobenzyna.pl/wp-content/uploads/img_alfa-romeo-stelvio.jpg',
                'type' => CarType::D,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'model_id' => 2,
                'name' => 'FL',
                'production_from' => 2022,
                'production_to' => null,
                'image' => 'https://www.motobenzyna.pl/wp-content/uploads/alfa-romeo-stelvio-fl.jpg',
                'type' => CarType::D,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'model_id' => 3,
                'name' => '',
                'production_from' => 2022,
                'production_to' => null,
                'image' => 'https://www.motobenzyna.pl/wp-content/uploads/alfa-romeo-tonale.jpg',
                'type' => CarType::D,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($generations as $generation) {
            CarGeneration::create([
                'id' => $generation['id'],
                'model_id' => $generation['model_id'],
                'name' => $generation['name'],
                'production_from' => $generation['production_from'],
                'production_to' => $generation['production_to'],
                'image' => $generation['image'],
                'type' => $generation['type'],
                'created_at' => $generation['created_at'],
                'updated_at' => $generation['updated_at']
            ]);
        }

        $this
            ->command
            ->info('Successfully imported ' . \count($generations) . ' generations');
    }
}
