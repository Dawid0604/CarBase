<?php

declare(strict_types=1);

namespace App\Models;

enum CarFuelType: string
{
    case GAS_PETROL = 'GAS_PETROL';
    case DIESEL = 'DIESEL';
    case HYBRID = 'HYBRID';
    case ELECTRIC = 'ELECTRIC';
}
