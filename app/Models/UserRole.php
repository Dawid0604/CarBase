<?php

declare(strict_types=1);

namespace App\Models;

enum UserRole: string
{
    case USER = 'USER';
    case ADMIN = 'ADMIN';
}
