<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="comment" class="form-label fw-bold">Twoja opinia</label>

            <textarea wire:model.blur="comment" class="form-control @error('comment') is-invalid @enderror" id="comment"
                rows="4" placeholder="Wyraź swoją opinię o silniku..."></textarea>

            @error('comment')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <hr class="my-4">

        <x-rating-stars label="Ocena ogólna" field="rating" :value="$rating"></x-rating-stars>
        <x-rating-stars label="Trwałość" field="reliability" :value="$reliability"></x-rating-stars>
        <x-rating-stars label="Spalanie" field="consumption" :value="$consumption"></x-rating-stars>
        <x-rating-stars label="Dynamika" field="dynamic" :value="$dynamic"></x-rating-stars>

        <hr class="my-4">

        <div class="mb-3 row">
            <div class="col-md-12">
                <p class="form-label fw-bold">
                    Czy polecasz silnik?
                    <span class="text-danger">*</span>
                </p>
            </div>

            <div class="custrom-control custom-radio col-md-6 mx-2">
                <input type="radio" class="custom-control-input" id="recommendation_yes" name="recommendation"
                    required>

                <label for="recommendation_yes" class="custom-controll-label">
                    Tak
                </label>
            </div>

            <div class="custom-control custom-radio mb-3 col-md-6 mx-2">
                <input type="radio" class="custom-control-input" id="recommendation_no" name="recommendation"
                    required>

                <label for="recommendation_no" class="custom-controll-label">
                    Nie
                </label>
            </div>
        </div>

        <hr class="my-4">

        @error('general')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

        <div class="d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Anuluj
            </button>

            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove>Dodaj opinię</span>
                <span wire:loading>Zapisywanie...</span>
            </button>
        </div>
    </form>
</div>
