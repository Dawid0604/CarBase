<?php

declare(strict_types=1);

use App\Casts\MysqlSetCast;
use Illuminate\Database\Eloquent\Model;

// =======================
// get() - method tests
// =======================

it('returns proper value on get', function (mixed $value, array $expectedValue): void {
    // Arrange
    $cast = new MysqlSetCast();
    $model = new class extends Model {};

    // Act
    $result = $cast->get($model, 'xyz', $value, []);

    // Assert
    expect($result)->toBe($expectedValue);
})->with([
    ['', []],
    [null, []],
    ['x,y,z', ['x', 'y', 'z']],
    ['x', ['x']],
    ['x,', ['x']]
]);

// =======================
// set() - method tests
// =======================
it('returns proper value on set', function (mixed $value, ?string $expectedValue): void {
    // Arrange
    $cast = new MysqlSetCast();
    $model = new class extends Model {};

    // Act
    $result = $cast->set($model, 'xyz', $value, []);

    // Assert
    expect($result)->toBe($expectedValue);
})->with([
    [null, null],
    ['', null],
    [['x', 'y', 'z'], 'x,y,z'],
    [['x', 'y', ''], 'x,y'],
    [[], null],
]);
