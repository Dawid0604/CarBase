<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

final class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'id' => 1,
                'brand_id' => 1,
                'name' => 'Giulietta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'name' => 'Stelvio',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'brand_id' => 1,
                'name' => 'Tonale',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($models as $model) {
            CarModel::create([
                'id' => $model['id'],
                'brand_id' => $model['brand_id'],
                'name' => $model['name'],
                'created_at' => $model['created_at'],
                'updated_at' => $model['updated_at']
            ]);
        }

        $this
            ->command
            ->info('Successfully imported ' . \count($models) . ' models');
    }
}
