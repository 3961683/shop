<x-layouts.app title="Главная">

    @foreach(App\Models\Product::all() as $product)
        <div class="card card-body my-3">
            {{ $product->name }}

            <form action="{{ route('cart.store', $product) }}" method="post">
                @csrf

                <button class="btn btn-primary">
                    {{ __('Add to cart') }}
                </button>

            </form>
        </div>
    @endforeach

</x-layouts.app>
