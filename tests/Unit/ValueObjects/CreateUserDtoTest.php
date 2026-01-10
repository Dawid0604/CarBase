<?php

declare(strict_types=1);

use App\ValueObjects\User\CreateUserDto;

describe('CreateUserDto tests', function () {

    it('throws exception when required keys are missing', function (array $data) {
        // Arrange
        // Act
        // Assert
        expect(fn() => CreateUserDto::fromArray($data))
            ->toThrow(InvalidArgumentException::class);
    })->with([
        'name is missing' => [[
            'email' => 'xyz',
            'password' => 'xyz2'
        ]],
        'name is empty' => [[
            'email' => 'xyz',
            'password' => 'xyz2',
            'name' => ''
        ]],
        'name is not string' => [[
            'email' => 'xyz',
            'password' => 'xyz2',
            'name' => 3
        ]],
        'email is missing' => [[
            'name' => 'xyz',
            'password' => 'xyz2'
        ]],
        'email is empty' => [[
            'name' => 'xyz',
            'password' => 'xyz2',
            'email' => ''
        ]],
        'email is not string' => [[
            'name' => 'xyz',
            'password' => 'xyz2',
            'email' => 3
        ]],
        'password is missing' => [[
            'name' => 'xyz',
            'email' => 'xyz2'
        ]],
        'password is empty' => [[
            'name' => 'xyz',
            'email' => 'xyz2',
            'password' => ''
        ]],
        'password is not string' => [[
            'name' => 'xyz',
            'email' => 'xyz2',
            'password' => 3
        ]],
        'array is empty' => [[]],
        'array with differ keys than required' => [[
            'x' => 'y',
            'z' => 'z',
            'y' => '',
            'c' => 3
        ]]
    ]);

    it('creates object successfully', function () {
        // Arrange
        $name = 'xyz';
        $email = 'xyz2';
        $password = 'xyz3';
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        // Act
        $result = CreateUserDto::fromArray($data);

        // Assert
        expect($result)->toBeInstanceOf(CreateUserDto::class);
        expect($result->name)->toBe($name);
        expect($result->email)->toBe($email);
        expect($result->password)->toBe($password);
    });
});
