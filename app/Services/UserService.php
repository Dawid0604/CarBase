<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

interface UserService
{
    public function create(array $data): User;
}
