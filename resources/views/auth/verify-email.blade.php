<x-layouts.auth :title="__('Verify email')">

    @if(session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-3">
            {{ __('Verification link is sent to your email.') }}
        </div>
    @else
    <div class="text-sm text-secondary mb-3">
        {{ __('To access this page please verify your email.') }}
    </div>
    @endif

    <div class="d-flex justify-content-between">
        <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button class="btn btn-primary">
                {{ __('Resend verification email') }}
            </button>
        </form>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger">
                {{ __('Logout') }}
            </button>
        </form>
    </div>

</x-layouts.auth>
