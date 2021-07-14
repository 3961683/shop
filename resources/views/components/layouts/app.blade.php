@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>
    <x-partials.navbar>

        <x-partials.navbar.link href="{{ url('/') }}">
            {{__('Home')}}
        </x-partials.navbar.link>

        @auth
            <x-slot name="userBar">
                <x-partials.navbar.link href="{{ route('cart.index') }}">
                    {{ __('Cart') }}
                    <span class="badge bg-secondary">
                        {{ auth()->user()->cart_count }}
                    </span>
                </x-partials.navbar.link>
            </x-slot>
        @endauth

    </x-partials.navbar>

    <div class="container mt-3">
        {{ $slot }}
    </div>
</x-layouts.base>
