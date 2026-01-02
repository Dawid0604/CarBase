<?php

declare(strict_types=1);

namespace App\Repositories;

use Override;
use App\Models\User;
use App\ValueObjects\CreateUserDto;
use Illuminate\Support\Facades\Hash;

final class UserRepositoryImpl implements UserRepository
{
    #[Override]
    public function create(CreateUserDto $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
    }
}
