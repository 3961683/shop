@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>
    <x-partials.navbar>
        <x-partials.navbar.link href="{{ route('admin.dashboard') }}">
            {{__('Dashboard')}}
        </x-partials.navbar.link>
        <x-partials.navbar.link href="{{ route('admin.categories.index') }}">
            {{__('Categories')}}
        </x-partials.navbar.link>
        <x-partials.navbar.link href="{{ route('admin.products.index') }}">
            {{__('Products')}}
        </x-partials.navbar.link>
    </x-partials.navbar>

    <div class="container mt-3">

        @if($title || ($toolbar ?? false))
        <div class="d-flex align-items-center mb-3">
            @if($title)
                <h1 class="h3 mb-0">{{ $title }}</h1>
            @endif

            @if($toolbar ?? false)
                <div class="d-flex align-items-center ms-auto">
                    {{ $toolbar }}
                </div>
            @endif
        </div>
        @endif
        {{ $slot }}
    </div>
</x-layouts.base>
