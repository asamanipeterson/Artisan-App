<div class="mb-3 form-floating-group"> {{-- Added a wrapper class --}}
    <input type="{{ $type ?? 'text' }}"
           name="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
           id="{{ $name }}"
           placeholder=" " {{-- Crucial: Set placeholder to a single space --}}
           value="{{ old($name, $value ?? '') }}">
    <label for="{{ $name }}" class="floating-label">{{ $label }}</label> {{-- Label moved after input, added floating-label class --}}

    @error($name)
        <div id="invalid{{ ucfirst($name) }}Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
