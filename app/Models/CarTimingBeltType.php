<?php

declare(strict_types=1);

namespace App\Models;

enum CarTimingBeltType: string
{
    case BELT = 'BELT';
    case CHAIN = 'CHAIN';
}
