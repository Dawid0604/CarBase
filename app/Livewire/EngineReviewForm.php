<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;
use App\Enums\RatingField;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\{Auth, Session};

final class EngineReviewForm extends Component
{
    public string $comment;

    public int $rating;

    public int $reliability;

    public int $consumption;

    public int $dynamic;

    public bool $recommendation;

    public string $engineSlug;

    protected $rules = [
        'comment' => 'nullable|string|max:1000',
        'rating' => 'required|integer|min:1|max:5',
        'reliability' => 'required|integer|min:1|max:5',
        'consumption' => 'required|integer|min:1|max:5',
        'dynamic' => 'required|integer|min:1|max:5',
        'recommendation' => 'required|boolean',
        'engineSlug' => 'required|string|min:1'
    ];

    private const string STAR_FIELD_MIN_MESSAGE = 'Oceń';
    private const string REQUIRED_FIELD_MESSAGE = 'To pole jest wymagane';
    private const string STAR_FIELD_MAX_MESSAGE = 'Maksymalna ilość gwiazdek wynosi 5';

    protected $messages = [
        'rating.required' => self::REQUIRED_FIELD_MESSAGE,
        'reliability.required' => self::REQUIRED_FIELD_MESSAGE,
        'consumption.required' => self::REQUIRED_FIELD_MESSAGE,
        'dynamic.required' => self::REQUIRED_FIELD_MESSAGE,
        'recommentation.required' => self::REQUIRED_FIELD_MESSAGE,
        'engineSlug.required' => self::REQUIRED_FIELD_MESSAGE,

        'rating.min' => self::STAR_FIELD_MIN_MESSAGE,
        'reliability.min' => self::STAR_FIELD_MIN_MESSAGE,
        'consumption.min' => self::STAR_FIELD_MIN_MESSAGE,
        'dynamic.min' => self::STAR_FIELD_MIN_MESSAGE,
        'engineSlug.min' => self::STAR_FIELD_MIN_MESSAGE,

        'rating.max' => self::STAR_FIELD_MAX_MESSAGE,
        'reliability.max' => self::STAR_FIELD_MAX_MESSAGE,
        'consumption.max' => self::STAR_FIELD_MAX_MESSAGE,
        'dynamic.max' => self::STAR_FIELD_MAX_MESSAGE,
        'comment.max' => 'Opinia nie powinna być dłuższa niż 1000 znaków'
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
