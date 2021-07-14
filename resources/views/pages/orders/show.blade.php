<x-layouts.app :title="__('Order')">
    <h1 class="h3 mb-3">{{ __('Order') }}</h1>

    <div class="card">
        <div class="list-group list-group-flush">

            <div class="list-group-item">
                <small class="text-secondary">{{ __('Address') }}</small>
                <div>{{ $order->address }}</div>
            </div>

            <div class="card-header">
                {{ __('Products') }}
            </div>

            @foreach($orderProducts as $orderProduct)
                <div class="list-group-item">
                    @if($orderProduct['product'])
                        <div>
                            {{ $orderProduct['product']->name }}
                        </div>
                        <small class="text-secondary">
                            {{ $orderProduct['product']->description }}
                        </small>
                    @else
                        <div>Deleted</div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
