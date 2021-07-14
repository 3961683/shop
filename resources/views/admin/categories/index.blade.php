<x-layouts.admin :title="__('Categories')">
    <x-slot name="toolbar">
        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">
            {{ __('Add category') }}
        </a>
    </x-slot>

    @if($categories->isEmpty())
        <div class="alert alert-secondary">
            {{ __('No category added yet') }}.
            {{ __('Please,') }}
            <a class="alert-link" href="{{ route('admin.categories.create') }}">
                add one
            </a>
        </div>

    @else

        @foreach($categories as $category)
            <div class="card card-body my-3 d-flex flex-row align-items-center">
                <div class="me-auto">
                    {{ $category->name }}
                </div>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                    @csrf @method('delete')

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary">
                            {{ __('View') }}
                        </a>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
                            {{ __('Edit') }}
                        </a>

                        <button class="btn btn-danger">
                            {{ __('Delete') }}
                        </button>
                    </div>
                </form>
            </div>
        @endforeach

        {{ $categories->links() }}

    @endif
</x-layouts.admin>
