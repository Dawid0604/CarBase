<?php

declare(strict_types=1);

namespace App\Enums;

enum CarTransmissionType: string
{
    case MANUAL = 'MANUAL';
    case AUTO = 'AUTO';
}
