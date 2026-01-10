<?php

declare(strict_types=1);

use App\Models\User;
use App\ValueObjects\User\CreateUserDto;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

describe('UserRepositoryImpl tests', function () {

    describe('create() tests', function () {

        it('creates user', function () {
            // Arrange
            $name = 'xyz';
            $email = 'xyz2';
            $password = 'xyz3';

            $data = CreateUserDto::fromArray([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);

            // Act
            $result = createUser($data);

            // Assert
            expect($result)->toBeInstanceOf(User::class);
            expect($result->name)->toBe($name);
            expect($result->email)->toBe($email);
            expect(Hash::check($password, $result->password))->toBeTrue();
        });

        function createUser(CreateUserDto $data): User
        {
            return getUserRepository()->create($data);
        }
    });

    function getUserRepository(): UserRepository
    {
        return App::make(UserRepository::class);
    }
});
