<?php

declare(strict_types=1);

namespace App\Models;

enum EngineInjectionType: string
{
    case DIRECT = 'DIRECT';
    case INDIRECT = 'INDIRECT';
    case MULTIPOINT = 'MULTIPOINT';
    case COMMON_RAIL = 'COMMON_RAIL';
}
