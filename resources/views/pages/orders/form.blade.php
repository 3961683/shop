<x-layouts.app :title="__('Orders')">

    <h1>
        {{ __('Orders') }}
    </h1>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="list-group list-group-flush">
                    @foreach($cart as $c)
                        <div class="list-group-item">
                            <div>
                                {{ $c->product->name }}
                                @if($c->product->category)
                                    <span class="badge bg-secondary">
                                        {{ $c->product->category->name }}
                                    </span>
                                @endif
                            </div>
                            <small class="text-secondary">
                                {{ $c->product->description }}
                            </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            <form action="{{ route('orders.store') }}" method="post" class="card card-body">
                @csrf

                <div class="mb-3">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="address" name="address" type="text">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{ __('Order') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
