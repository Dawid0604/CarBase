<?php

declare(strict_types=1);

namespace App\ValueObjects;

use InvalidArgumentException;

final readonly class CreateUserDto
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: static::getValue($data['name'] ?? ''),
            email: static::getValue($data['email'] ?? ''),
            password: static::getValue($data['password'] ?? '')
        );
    }

    private static function getValue(mixed $value): string
    {
        if (!\is_string($value) || empty(\trim($value))) {
            throw new InvalidArgumentException('value must be a non empty string');
        }

        return $value;
    }
}
