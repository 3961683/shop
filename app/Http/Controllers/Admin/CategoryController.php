<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->paginate(5);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::query()
            ->create($request->validated());


        return redirect()->route('admin.categories.show', $category);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
