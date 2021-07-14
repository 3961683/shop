<x-layouts.app :title="__('Cart')">

    @if($cart->isEmpty())
        <div class="alert alert-warning">
            {{ __('There are no items in your cart') }}
        </div>
    @else
        <div class="card card-body">
            <table class="table table-bordered">

                <thead>
                <tr>
                    <th width="100%">{{ __('Name') }}</th>
                    <th>{{ __('Amount') }}</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($cart as $c)
                    <tr>
                        <td>
                            {{ $c->product->name }}
                        </td>
                        <td>
                            {{ $c->amount }}
                        </td>
                        <td>
                            <form action="{{ route('cart.destroy', $c) }}" method="post">
                                @csrf @method('delete')
                                <button class="btn btn-sm btn-outline-danger border-0">
                                    &times;
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            <a href="{{ route('orders.create') }}" class="ms-auto btn btn-success">
                {{ __('Proceed orders') }}
            </a>
        </div>
    @endif
</x-layouts.app>
