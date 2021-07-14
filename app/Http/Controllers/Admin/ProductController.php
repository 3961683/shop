<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->paginate();
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.products.form', [
            'categories' => $this->getCategoriesForForm()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product($request->validated());
        $product->category()->associate($request->category_id);
        $product->save();

        return redirect()->route('admin.products.show', $product);
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', [
            'product' => $product,
            'categories' => $this->getCategoriesForForm()
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->validated());
        $product->category()->associate($request->category_id);
        $product->save();

        return redirect()->route('admin.products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    protected function getCategoriesForForm() {
        return Category::query()
            ->orderBy('name')->get();
    }
}
