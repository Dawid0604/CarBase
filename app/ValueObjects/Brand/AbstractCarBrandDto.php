<?php

declare(strict_types=1);

namespace App\ValueObjects\Brand;

abstract readonly class AbstractCarBrandDto
{
    public function __construct(
        public string $name,
        public string $logo,
        public string $slug
    ) {
    }
}
