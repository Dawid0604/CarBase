<?php

declare(strict_types=1);

namespace App\Models;

enum EngineInjectionType: string
{
    case DIRECT = 'DIRECT';
    case INDIRECT = 'INDIRECT';
    case MULTIPOINT = 'MULTIPOINT';
    case COMMON_RAIL = 'COMMON_RAIL';

    public function getTranslatedName(): string
    {
        return match($this) {
            EngineInjectionType::DIRECT => 'Bezpośredni',
            EngineInjectionType::INDIRECT => 'Pośredni',
            EngineInjectionType::MULTIPOINT => 'Wielopunktowy',
            EngineInjectionType::COMMON_RAIL => 'Common Rail'
        };
    }
}
