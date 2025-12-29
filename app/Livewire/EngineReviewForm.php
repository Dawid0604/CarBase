<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{Auth, Session};

final class EngineReviewForm extends Component
{
    public string $comment = '';

    public int $rating = 0;

    public int $reliability = 0;

    public int $consumption = 0;

    public int $dynamic = 0;

    public bool $recommendation = false;

    public string $engineSlug;

    protected $rules = [
        'comment' => 'nullable|string|max:1000',
        'rating' => 'required|integer|min:1|max:5',
        'reliability' => 'required|integer|min:1|max:5',
        'consumption' => 'required|integer|min:1|max:5',
        'dynamic' => 'required|integer|min:1|max:5',
        'recommendation' => 'required|boolean'
    ];

    private const string STAR_FIELD_MIN_MESSAGE = 'Wypełnij to pole';
    private const string STAR_FIELD_MAX_MESSAGE = 'Maksymalna ilość gwiazdek wynosi 5';

    protected $messages = [
        'comment.max' => 'Opinia nie powinna być dłuższa niż 1000 znaków',

        'rating.min' => self::STAR_FIELD_MIN_MESSAGE,
        'reliability.min' => self::STAR_FIELD_MIN_MESSAGE,
        'consumption.min' => self::STAR_FIELD_MIN_MESSAGE,
        'dynamic.min' => self::STAR_FIELD_MIN_MESSAGE,

        'rating.max' => self::STAR_FIELD_MAX_MESSAGE,
        'reliability.max' => self::STAR_FIELD_MAX_MESSAGE,
        'consumption.max' => self::STAR_FIELD_MAX_MESSAGE,
        'dynamic.max' => self::STAR_FIELD_MAX_MESSAGE,

        'recommendation.required' => 'Rekomendacja jest wymagana'
    ];

    public function render(): View
    {
        return view('livewire.engine-review-form');
    }

    public function submit(): void
    {
        if (!Auth::check()) {
            $this->addError('general', 'Wymagana autoryzacja!');
            return;
        }

        $this->validate();
        Session::flash('success', 'Opinia została pomyślnie zapisana');

        $this->reset();
    }

    private function updateRating(RatingField $field, int $value): void
    {
        if ($value < 1 || $value > 5) {
            return;
        }

        match ($field) {
            RatingField::RATING => $this->rating = $value,
            RatingField::RELIABILITY => $this->reliability = $value,
            RatingField::CONSUMPTION => $this->consumption = $value,
            RatingField::DYNAMIC => $this->dynamic = $value
        };
    }

    public function setRating(string|int $value): void
    {
        $this->updateRating(RatingField::RATING, (int) $value);
    }

    public function setReliability(string|int $value): void
    {
        $this->updateRating(RatingField::RELIABILITY, (int) $value);
    }

    public function setConsumption(string|int $value): void
    {
        $this->updateRating(RatingField::CONSUMPTION, (int) $value);
    }

    public function setDynamic(string|int $value): void
    {
        $this->updateRating(RatingField::DYNAMIC, (int) $value);
    }
}
