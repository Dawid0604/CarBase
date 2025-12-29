<?php

declare(strict_types=1);

namespace App\View\Components;

use Override;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

final class RatingStars extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    #[Override]
    public function render(): View
    {
        return view('components.rating-stars');
    }
}
