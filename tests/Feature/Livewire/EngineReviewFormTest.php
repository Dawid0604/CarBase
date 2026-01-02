<?php

declare(strict_types=1);

use App\Models\User;
use Livewire\Livewire;
use App\Livewire\EngineReviewForm;
use Livewire\Features\SupportTesting\Testable;

describe('EngineReviewForm tests', function () {

    describe('render() tests', function () {

        it('renders successfully', function () {
            Livewire::test(EngineReviewForm::class, ['engineSlug' => 'xyz'])
                ->assertStatus(200);
        });
    });

    describe('validation tests', function () {

        describe('star field', function () {

            it('requirement', function (string $fieldName) {
                livewire()
                    ->set($fieldName, null)
                    ->call('submit')
                    ->assertHasErrors($fieldName);
            })->with([
                ['rating'],
                ['reliability'],
                ['consumption'],
                ['dynamic'],
                ['recommendation'],
            ]);

            it('min value', function (string $fieldName, string|int $value) {
                livewire()
                    ->set($fieldName, $value)
                    ->call('submit')
                    ->assertHasErrors($fieldName);
            })->with([
                ['rating', 0],
                ['rating', -1],
                ['rating', '0'],
                ['rating', '-1'],

                ['reliability', 0],
                ['reliability', -1],
                ['reliability', '0'],
                ['reliability', '-1'],

                ['consumption', 0],
                ['consumption', -1],
                ['consumption', '0'],
                ['consumption', '-1'],

                ['dynamic', 0],
                ['dynamic', -1],
                ['dynamic', '0'],
                ['dynamic', '-1']
            ]);

            it('max value', function (string $fieldName, string|int $value) {
                livewire()
                    ->set($fieldName, $value)
                    ->call('submit')
                    ->assertHasErrors($fieldName);
            })->with([
                ['rating', 6],
                ['rating', 10],
                ['rating', '6'],
                ['rating', '11'],

                ['reliability', 6],
                ['reliability', 10],
                ['reliability', '6'],
                ['reliability', '10'],

                ['consumption', 6],
                ['consumption', 10],
                ['consumption', '6'],
                ['consumption', '10'],

                ['dynamic', 6],
                ['dynamic', 10],
                ['dynamic', '6'],
                ['dynamic', '10']
            ]);
        });

        describe('recommendation field', function () {

            it('requirement', function () {
                livewire()
                    ->set('recommendation', null)
                    ->call('submit')
                    ->assertHasErrors('recommendation');
            });
        });

        describe('engineSlug field', function () {

            it('requirement', function () {
                livewire()
                    ->set('engineSlug', null)
                    ->call('submit')
                    ->assertHasErrors('engineSlug');
            });

            it('min value', function () {
                livewire()
                    ->set('engineSlug', '')
                    ->call('submit')
                    ->assertHasErrors('engineSlug');
            });
        });

        describe('comment field', function () {

            it('comment is optional', function () {
                livewire()
                    ->call('submit')
                    ->assertHasNoErrors();
            });

            it('max value', function () {
                $longComment = \str_repeat('a', 1001);

                livewire()
                    ->set('comment', $longComment)
                    ->call('submit')
                    ->assertHasErrors('comment');
            });
        });
    });

    describe('authorization tests', function () {

        it('deny for unauthenticated user', function () {
            Livewire::test(EngineReviewForm::class, ['engineSlug' => 'xyz'])
                ->set('comment', 'test comment')
                ->set('reliability', 2)
                ->set('consumption', 3)
                ->set('dynamic', 4)
                ->set('rating', 5)
                ->set('recommendation', true)
                ->call('submit')
                ->assertHasErrors('general')
                ->assertSee('Wymagana autoryzacja');
        });

        it('allow for authenticated user', function () {
            livewire()
                ->call('submit')
                ->assertHasNoErrors()
                ->assertSee('Opinia została pomyślnie zapisana');
        });
    });
});

function livewire(): Testable
{
    $user = User::factory()->create();

    return Livewire::actingAs($user)
        ->test(EngineReviewForm::class, ['engineSlug' => 'xyz'])
        ->set('reliability', 2)
        ->set('consumption', 3)
        ->set('dynamic', 4)
        ->set('rating', 5)
        ->set('recommendation', true);
}
