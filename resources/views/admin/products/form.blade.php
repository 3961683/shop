<?php
$previous = url()->previous();
if (request()->fullUrlIs($previous))
    $previous = route('admin.products.index');

$product = $product ?? null;
?>

<x-layouts.admin :title="__($product ? 'Edit product' : 'New product')">

    <x-slot name="toolbar">
        <a href="{{ $previous }}" class="btn btn-outline-danger">
            {{ __('Cancel') }}
        </a>
    </x-slot>

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $product ? route('admin.products.update', $product) : route('admin.products.store') }}"
                  method="post">
                @csrf @if($product) @method('put') @endif

                <div class="mb-3">
                    <label for="category_id" class="form-label">{{ __('Category') }}</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">{{ __('Without category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category->id ?? null) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" type="text" id="name" name="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror "
                              name="description" id="description">{{ old('description', $product->description ?? null) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{ __($product ? 'Edit' : 'Add') }}
                </button>

            </form>
        </div>
    </div>

</x-layouts.admin>
