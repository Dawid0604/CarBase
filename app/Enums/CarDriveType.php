<?php

declare(strict_types=1);

namespace App\Enums;

enum CarDriveType: string
{
    case FWD = 'FWD';
    case AWD = 'AWD';
    case RWD = 'RWD';
}
