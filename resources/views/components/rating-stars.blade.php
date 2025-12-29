@props(['label', 'field', 'value'])

<div class="mb-3">
    <p class="block font-medium mb-2">
        {{ $label }}
        <span class="text-danger">*</span>
    </p>

    <div class="flex gap-1">
        @for ($i = 1; $i <= 5; $i++)
            <button type="button" wire:click="set{{ ucfirst(Str::camel($field)) }}({{ $i }})"
                class=" {{ $value >= $i ? 'text-warning' : 'text-gray' }}">
                <i class="bi bi-star-fill"></i>
            </button>
        @endfor
    </div>

    @error($field)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
