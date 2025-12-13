<?php

declare(strict_types=1);

namespace App\Models;

enum CarDriveType: string
{
    case FWD = 'FWD';
    case AWD = 'AWD';
    case RWD = 'RWD';
}
