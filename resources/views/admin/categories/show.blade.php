<x-layouts.admin :title="$category->name">

    <x-slot name="toolbar">
        <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
            @csrf @method('delete')

            <div class="btn-group">
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning">
                    {{ __('Edit') }}
                </a>

                <button class="btn btn-danger">
                    {{ __('Delete') }}
                </button>
            </div>
        </form>
    </x-slot>

</x-layouts.admin>
