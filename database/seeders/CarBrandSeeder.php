<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CarBrand;
use Illuminate\Database\Seeder;

final class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'id' => 1,
                'name' => 'Alfa Romeo',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/alfa-romeo-4.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'MG',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/mg.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Renault',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/renault-7.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'Chrysler',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/chrysler-wings.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'name' => 'Audi',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/audi-new-logo.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'name' => 'BMW',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/bmw-2.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'name' => 'Honda',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/honda-logo-4.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'name' => 'Toyota',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/toyota-7.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'name' => 'Volkswagen',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/volkswagen-9.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'name' => 'Porsche',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/porsche-2.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'name' => 'Fiat',
                'logo' => 'https://cdn.worldvectorlogo.com/logos/fiat-3.svg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($brands as $brand) {
            CarBrand::create([
                'id' => $brand['id'],
                'name' => $brand['name'],
                'logo' => $brand['logo'],
                'created_at' => $brand['created_at'],
                'updated_at' => $brand['updated_at']
            ]);
        }

        $this
            ->command
            ->info('Successfully imported ' . \count($brands) . ' brands');
    }
}
