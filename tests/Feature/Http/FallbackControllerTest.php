<?php

declare(strict_types=1);

use Pest\Laravel as laravel;

describe('FallbackController tests', function (): void {

    it('redirects to home', function (): void {
        // Arrange
        // Act
        $response = laravel\get('/any/not/existing/url');

        // Assert
        $response->assertRedirect(route('home'));
    });

    it('logs properly unknown route', function (): void {
        // Arrange
        Log::shouldReceive('warning')
            ->once();

        // Act
        // Assert
        laravel\get('/any/not/existing/url');
    });
});
