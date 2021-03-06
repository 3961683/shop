<x-layouts.auth :title="__('Confirm password')">

    <form action="{{ route('password.confirm') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end">
            <button class="btn btn-primary">
                {{ __('Confirm') }}
            </button>
        </div>

    </form>

</x-layouts.auth>
