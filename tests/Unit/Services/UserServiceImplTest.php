<?php

declare(strict_types=1);

use App\Models\User;
use App\Services\UserServiceImpl;
use App\ValueObjects\CreateUserDto;
use App\Repositories\UserRepository;

describe('UserServiceImpl tests', function () {

    describe('create() tests', function () {

        it('creates user successfully', function () {
            // Arrange
            $data = [
                'name' => 'xyz',
                'email' => 'xyz@mail.com',
                'password' => 'xyz2'
            ];

            $user = new User();
            $user->id = 4;

            $repository = Mockery::mock(UserRepository::class);
            $service = new UserServiceImpl($repository);

            $repository
                ->shouldReceive('create')
                ->with(Mockery::on(
                    fn($dto): bool =>
                    $dto instanceof CreateUserDto
                        && $dto->name === $data['name']
                        && $dto->email === $data['email']
                        && $dto->password === $data['password']
                ))
                ->once()
                ->andReturn($user);

            // Act
            $result = $service->create($data);

            // Assert
            expect($result->id)->toBe($user->id);
        });
    });
});
