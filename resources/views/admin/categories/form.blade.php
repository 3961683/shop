<?php
$previous = url()->previous();
if (request()->fullUrlIs($previous))
    $previous = route('admin.categories.index');

$category = $category ?? null;
?>

<x-layouts.admin :title="__($category ? 'Edit category' : 'New category')">

    <x-slot name="toolbar">
        <a href="{{ $previous }}" class="btn btn-outline-danger">
            {{ __('Cancel') }}
        </a>
    </x-slot>

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $category ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
                  method="post">
                @csrf @if($category) @method('put') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category?->name) }}" type="text" id="name" name="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{ __($category ? 'Edit' : 'Add') }}
                </button>

            </form>
        </div>
    </div>

</x-layouts.admin>
