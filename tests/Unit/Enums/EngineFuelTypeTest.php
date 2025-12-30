<?php

declare(strict_types=1);

use App\Enums\EngineFuelType;

describe('EngineFuelType tests', function (): void {

    describe('shouldShowLpgInfo() method tests', function (): void {

        it('returns proper result', function (EngineFuelType $fuelType, bool $expectedResult): void {
            // Arrange
            // Act
            $result = $fuelType->shouldShowLpgInfo();

            // Assert
            expect($result)->toBe($expectedResult);
        })->with([
            'Gasoline should return true' => [EngineFuelType::GASOLINE, true],
            'Hybrid should return true' => [EngineFuelType::HYBRID, true],
            'Diesel should return false' => [EngineFuelType::DIESEL, false],
            'Electric should return false' => [EngineFuelType::ELECTRIC, false]
        ]);
    });

    describe('getBackgroundColor() method tests', function (): void {

        it('returns valid values', function (): void {
            // Arrange
            $values = array_map(fn(EngineFuelType $value): string => $value->getBackgroundColor(), EngineFuelType::cases());

            // Act
            // Assert
            expect($values)
                ->each
                ->not()->toBeNull()
                ->not()->toBe('')
                ->toBeString();
        });

        it('has unique values', function (): void {
            // Arrange
            $values = array_map(fn(EngineFuelType $value): string => $value->getBackgroundColor(), EngineFuelType::cases());

            // Act
            // Assert
            expect($values)->toHaveCount(count(array_unique($values)));
        });
    });

    describe('getTranslatedName() method tests', function (): void {

        it('has unique values', function (): void {
            // Arrange
            $values = array_map(fn(EngineFuelType $value): string => $value->getTranslatedName(), EngineFuelType::cases());

            // Act
            // Assert
            expect($values)->toHaveCount(count(array_unique($values)));
        });

        itHasValidTranslatedName(EngineFuelType::class);
    });

    itHasUniqueEnumValues(EngineFuelType::class);
});
