<?php

declare(strict_types=1);

use App\Casts\RateCast;
use Illuminate\Database\Eloquent\Model;

// =======================
// get() - method tests
// =======================

it('returns unchanged value on get', function (mixed $value): void {
    // Arrange
    $cast = new RateCast();
    $model = new class extends Model {};

    // Act
    $result = $cast->get($model, 'rating', $value, []);

    // Assert
    expect($result)->toBe($value);
})->with([
    [1],
    [-1],
    [0]
]);


// =======================
// set() - method tests
// =======================

it('return proper value on set', function (int $value, int $expectedValue): void {
    // Arrange
    $cast = new RateCast();
    $model = new class extends Model {};

    // Act
    $result = $cast->set($model, 'rating', $value, []);

    // Assert
    expect($result)->toBe($expectedValue);
})->with([
    [1, 1],
    [-1, 1],
    [-999, 1],
    [0, 1],
    [2, 2],
    [3, 3],
    [4, 4],
    [5, 5],
    [6, 5],
    [999, 5]
]);
