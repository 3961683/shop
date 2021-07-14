<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class OrderController extends Controller
{
    protected function getCart() {
        return auth()->user()
            ->cart()->latest()
            ->get();
    }

    function create() {
        $cart = $this->getCart();

        return view('pages.orders.form', [
            'cart' => $cart
        ]);
    }

    function store(OrderRequest $request) {
        $cart = $this->getCart();

        $products = $cart
            ->map(function (Cart $cart) {
                return [
                    'product_id' => $cart->product->id,
                    'amount' => $cart->amount,
                ];
            });

        $data = $request->validated() + ['products' => $products];

        $order = auth()->user()
            ->orders()->create($data);

        auth()->user()->cart()->delete();

        return redirect()->route('orders.show', $order);
    }

    function show(Order $order) {
        $orderProducts = collect($order->products);
        $ids = $orderProducts->pluck('product_id');

        $products = Product::query()
            ->whereIn('id', $ids)
            ->get();

        $orderProducts = $orderProducts->map(function ($data) use($products) {
            return [
                'amount' => $data['amount'],
                'product' => $products->where('id', $data['product_id'])->first(),
            ];
        });

        return view('pages.orders.show', [
            'order' => $order,
            'orderProducts' => $orderProducts
        ]);
    }
}
