<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use App\Models\User;
use App\Repositories\UserRepository;
use App\ValueObjects\CreateUserDto;

final class UserServiceImpl implements UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}

    #[Override]
    public function create(array $data): User
    {
        return $this
            ->userRepository
            ->create(CreateUserDto::fromArray($data));
    }
}
