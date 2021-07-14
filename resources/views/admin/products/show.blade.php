<x-layouts.admin :title="$product->name">

    <x-slot name="toolbar">
        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
            @csrf @method('delete')

            <div class="btn-group">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                    {{ __('Edit') }}
                </a>

                <button class="btn btn-danger">
                    {{ __('Delete') }}
                </button>
            </div>
        </form>
    </x-slot>

    <div class="card my-3">
        <div class="card-header">
            {{ __('Category') }}
        </div>
        <div class="card-body">
            {{ $product->category->name ?? __('Without category') }}
        </div>
    </div>

    @if ($description = trim($product->description))
        <div class="card my-3">
            <div class="card-header">
                {{ __('Description') }}
            </div>
            <div class="card-body">
                {{ $description }}
            </div>
        </div>
    @endif

</x-layouts.admin>
