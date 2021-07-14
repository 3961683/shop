<x-layouts.admin :title="__('Products')">
    <x-slot name="toolbar">
        <a class="btn btn-success" href="{{ route('admin.products.create') }}">
            {{ __('Add product') }}
        </a>
    </x-slot>

    @if($products->isEmpty())
        <div class="alert alert-secondary">
            {{ __('No product added yet') }}.
            {{ __('Please,') }}
            <a class="alert-link" href="{{ route('admin.products.create') }}">
                add one
            </a>
        </div>

    @else

        @foreach($products as $product)
            <div class="card card-body my-3 d-flex flex-row align-items-center">
                <div class="me-auto">
                    {{ $product->name }}
                    @if($product->category)
                        <span class="badge bg-secondary">{{ $product->category->name }}</span>
                    @endif
                </div>
                <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                    @csrf @method('delete')

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-primary">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                            {{ __('Edit') }}
                        </a>

                        <button class="btn btn-danger">
                            {{ __('Delete') }}
                        </button>
                    </div>
                </form>
            </div>
        @endforeach

        {{ $products->links() }}

    @endif
</x-layouts.admin>
