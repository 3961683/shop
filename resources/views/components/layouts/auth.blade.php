@props(['title' => null])
<!-- Anonymous component -->

<x-layouts.base :title="$title" {{ $attributes }}> <!--: means php code not string echo-->

    <div class="container p-3">
        <div class="row justify-content-center">
            <div class="col-4">
                <h1 class="h4 text-secondary mb-3 text-center">{{ $title }}</h1>

                <div class="card card-body">{{ $slot }}</div>
            </div>
        </div>
    </div>

</x-layouts.base>
